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
        return view('participante.index', compact('clasifications','featured_events','events_active','users_active','total_register'));
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
        return view('participante.events',compact('events','clasifications'));
    }
    public function event($id)
    {
        $event = Event::find($id);
        return view('participante.event_detail',compact('event'));
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
        return view('participante.registration_form',compact('event','participante','datos_completos','edad'));
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

        /*Mail::raw('Se ha registrado al evento'.$event->name.', que transcurrir?? en '.$event->location.' en la fecha '.$event->start_date, function($message)
        {
            $message->subject('Registro a evento exitoso!');
            $message->to(Auth::user()->email);
        });*/
        
        return redirect()->route('participante.schedule');
    }

    public function schedule()
    {
        $events = Event::all();
        $events_inscripto = Auth::user()->events_inscripto()->paginate(5);
        return view('participante.schedule',compact('events','events_inscripto'));
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
        return view('participante.profile',compact('participante'));
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
        return view('participante.upcoming',compact('events'));
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
}
