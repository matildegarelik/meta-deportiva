<?php

namespace App\Http\Controllers;

use App\Models\Clasification;
use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Participante;
use App\Models\Cupon;
use App\Models\User;
use App\Models\Answer;
use App\Models\Category;
use App\Models\ExtraPage;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Auth;

class ParticipanteController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $clasifications = Clasification::all();
        $featured_events = Event::where('featured_event',1)->where('published',1)->get();
        $events_active = Event::where('published',1)/*->whereDate('start_date', '>', now())*/->count();
        $users_active = User::where('role',1)->count();
        $total_register = EventInscripto::all()->count();
        $extra_pages = ExtraPage::where('menu',1)->get();
        return view('participante.index', compact('clasifications','extra_pages','featured_events','events_active','users_active','total_register'));
    }
    
    public function events(Request $request)
    {
        $events = Event::where('published',1);

        if(isset($request->search)){
            $events = $events->where('name', 'like', $request->search.'%');
        }
        if(isset($request->clasification) && $request->clasification!='0'){
            $events = $events->where('clasification_id', '=', intval($request->clasification));
        }
        $clasifications=Clasification::all();
        $events=$events->paginate(10);
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.events',compact('events','clasifications','extra_pages'));
    }
    public function event($id)
    {
        $event = Event::find($id);
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.event_detail',compact('event','extra_pages'));
    }
    public function registration_form($id)
    {
        $event = Event::find($id);
        $user_id = Auth::user()->id;
        if(!count(Participante::where('user_id',$user_id)->get())){
            $participante = Participante::create([
                'user_id'=>$user_id,
                'name'=>Auth::user()->name
            ]);
        }else{
            $participante=Participante::where('user_id',$user_id)->first();
        }
        $datos_completos = $participante->datos_completos();
        $edad=0;
        if($datos_completos || $participante->date_of_birth) $edad = $participante->edad();
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.registration_form',compact('event','participante','datos_completos','edad','extra_pages'));
    }
    
    public function register(Request $request)
    {
        $user_id = Auth::user()->id;
        $input = $request->all();
        $cupon_id = NULL;
        if($input['cupon_id']!='0'){
            $cupon_id = $input['cupon_id'];
        }
        $event_inscripto = EventInscripto::create([
            'event_id'=>$input['event'],
            'user_id'=>$user_id,
            'category_id'=>$input['category'],
            'cupon_id'=>$cupon_id
        ]);

        $event = Event::find($input['event']);
        $category = Category::find($input['category']);
        foreach($category->questions() as $q){
            if(isset($input['ans-'.$q->id])){
                Answer::create([
                    'event_inscripto_id'=>$event_inscripto->id,
                    'question_id'=>$q->id,
                    'answer'=>$input['ans-'.$q->id]
                ]);
            }
            
        }

        $event_inscripto->delete();

        $url = $this->pagar($event_inscripto->id,$input['precio_total']);
        return redirect()->away($url);

        //Si pasa mas de un tiempo sin pagar borrar inscripcion.

        /*Mail::raw('Se ha registrado al evento'.$event->name.', que transcurrirá en '.$event->location.' en la fecha '.$event->start_date, function($message)
        {
            $message->subject('Registro a evento exitoso!');
            $message->to(Auth::user()->email);
        });*/
        
        //return redirect()->route('participante.schedule');
    }

    public function schedule()
    {
        $events = Event::all();
        $events_inscripto = Auth::user()->events_inscripto()->paginate(5);
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.schedule',compact('events','events_inscripto','extra_pages'));
    }
    public function profile()
    {
        $user_id = Auth::user()->id;
        if(!count(Participante::where('user_id',$user_id)->get())){
            $participante = Participante::create([
                'user_id'=>$user_id,
                'name'=>Auth::user()->name
            ]);
        }else{
            $participante=Participante::where('user_id',$user_id)->first();
        }
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.profile',compact('participante','extra_pages'));
    }
    public function update_profile(Request $request)
    {
        $user_id = Auth::user()->id;
        $input = $request->all();
        $part = Participante::where('user_id',$user_id)->get();
        $imageName=$part[0]->profile_picture;
        if(isset($request->profile_picture) && $request->profile_picture!=null){
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('images/usuarios/'), $imageName);
        }
        
        $participante=Participante::where('user_id',$user_id)->update([
            'name'=>$input['name'],
            'father_last_name'=>$input['father_last_name'],
            'mother_last_name'=>$input['mother_last_name'],
            'gender'=>$input['gender'],
            'date_of_birth'=>$input['date_of_birth'],
            'phone_number'=>$input['phone_number'],
            'ec_name'=>$input['ec_name'],
            'ec_relationship'=>$input['ec_relationship'],
            'ec_phone'=>$input['ec_phone'],
            'street_number'=>$input['street_number'],
            'area'=>$input['area'],
            'city'=>$input['city'],
            'zipcode'=>$input['zipcode'],
            'state'=>$input['state'],
            'country'=>$input['country'],
            'profile_picture'=>$imageName

        ]);
        
        $participante=Participante::where('user_id',$user_id)->first();
        return redirect()->route('participante.profile', ['participante'=>$participante]);


    }
    public function upcoming()
    {
        $events = Event::all();
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.upcoming',compact('events','extra_pages'));
    }
    public function validar_cupon($cupon)
    {
        $cupon = Cupon::where('code',$cupon)->get();
        if(count($cupon) && $cupon[0]->es_valido()){
            return $cupon[0];
        }else{
            return false;
        }
        
    }
    public function questions_view($id){
        $category = Category::find($id);
        $returnHTML = view('participante.registration_form.questions_view')->with('questions', $category->questions())->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
    public function inscripcion_view($id)
    {
        $inscripcion = EventInscripto::find($id);
        if($inscripcion->first_time){
            $inscripcion->first_time=0;
            $inscripcion->save();
            Mail::send(['html'=>'mails.inscripcion_evento'],['event'=>$inscripcion->event], function($message)
            {
                $message->subject('Registro a evento exitoso!');
                $message->to(Auth::user()->email);
            });
        }
        $extra_pages=ExtraPage::where('menu',1)->get();
        return view('participante.inscripcion_view',compact('inscripcion','extra_pages'));
    }

    public function pagar($id_registro, $precio=120000){
        $inscripcion = EventInscripto::where('id',$id_registro)->withTrashed()->first();
        \Conekta\Conekta::setApiKey(env('CONEKTA_PRIVATE_API_KEY'));
        $validCustomer = [
            'name' => "Payment Link Name",
            'email' => $inscripcion->user->email
          ];
        $customer = \Conekta\Customer::create($validCustomer);
        $valid_order = array(
            'line_items'=> array(
              array(
                'name'=> 'Modalidad: '. $inscripcion->category->name,
                'description'=> $inscripcion->event->name,
                'unit_price'=> $precio*100,
                'quantity'=> 1,
                //'sku'=> 'cohbs1',
                'category'=> $inscripcion->event->clasification,
                //'tags' => array('food', 'mexican food')
              )
            ),
            'checkout' => array(
              'allowed_payment_methods' => array("cash", "card", "bank_transfer"),
              'type' => 'HostedPayment',
              'success_url' => route('participante.pago_aceptado',$id_registro),
              'failure_url' => 'https://www.mysite.com/payment/failure',
              'monthly_installments_enabled' => true,
              'monthly_installments_options' => array(3, 6, 9, 12),
              "redirection_time"=> 4 //Tiempo de Redirección al Success/Failure URL, umbrales de 4 a 120 seg.
            ),
            'customer_info' => array(
                'customer_id'  => $customer->id
            ),
            'currency'    => 'mxn',
            'metadata'    => array('test' => 'extra info')
          );

        try {
            $order = \Conekta\Order::create($valid_order);
            return $order->checkout->url;
            //header("Location: {$order->checkout->url}");
            //return redirect()->away($order->checkout->url);
        } catch (\Conekta\ProcessingError $e){
            echo $e->getMessage();
        } catch (\Conekta\ParameterValidationError $e){
            echo $e->getMessage();
        } /*finally (\Conekta\Handler $e){
        echo $e->getMessage();
        }*/

    }
    public function pago_aceptado($id_registro, Request $request){
        \Conekta\Conekta::setApiKey(env('CONEKTA_PRIVATE_API_KEY'));
        if(isset($request->payment_status)){
            if($request->payment_status == 'paid'){
                $estado = "Confirmado";
            }elseif($request->payment_status == 'pending_payment'){
                $estado = "Pendiente";
            }else{
                $estado = "Cancelado";
            }

            $order = \Conekta\Order::find($request->order_id);
            $metodo_pago=null;
            if(count($order->charges)) $metodo_pago=$order->charges[0]->payment_method->object.' - '.$metodo_pago=$order->charges[0]->payment_method->type;            

            $inscripcion = EventInscripto::where('id',$id_registro)->withTrashed()->first();
            $inscripcion->deleted_at = NULL;
            $inscripcion->estado = $estado;
            if($metodo_pago) $inscripcion->metodo_pago = $metodo_pago;
            $inscripcion->save();
            
            $extra_pages=ExtraPage::where('menu',1)->get();

            return redirect()->route('participante.inscripcion_view', ['id'=>$inscripcion->id,'extra_pages'=>$extra_pages]);
        }else{
            echo "Error en el pago";
            return;
        }
    }
    public function extra_page($nombre)
    {
        if(ExtraPage::where('nombre',$nombre)->count()>0){
            $extra_page = ExtraPage::where('nombre',$nombre)->first();
            $extra_pages=ExtraPage::where('menu',1)->get();
            return view('participante.extra_page',compact('extra_page','extra_pages'));
        }else{
            abort(404);
        }
    }
}
