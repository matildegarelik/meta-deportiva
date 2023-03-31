<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use ImageOptimizer;

use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;
use App\Models\Cupon;
use App\Models\Question;
use App\Models\Sponsor;
use App\Models\Organization;
use App\Models\Organizer;
use App\Models\Clasification;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{
    public function index()
    {
        return view('events.index',['events'=>Event::all()]);
    }
    public function event($id)
    {
        $event_inscriptos = EventInscripto::where('event_id',$id)->get();
        $inscriptos = DB::table('event_inscriptos')->select(['event_inscriptos.id as inscripcion_id','event_inscriptos.estado','event_inscriptos.event_id','users.name as name', 'event_inscriptos.user_id', 'users.email as email','categories.name as categoria'])
        ->join('categories','categories.id','=','event_inscriptos.category_id')    
        ->join('users','users.id','=','event_inscriptos.user_id')->where('event_inscriptos.event_id',$id)->get();
        $categories = Category::where('event_id',$id)->get();
        $cupons=Cupon::where('event_id',$id)->get();
        $questions=Question::where('event_id',$id)->get();
        return view('events.detail',['event'=>Event::find($id),'inscriptos'=>$inscriptos,'categories'=>$categories, 'cupons'=>$cupons, 'questions'=>$questions]);
    }
    public function new_event()
    {
        $organizations = Organization::all();
        $clasifications = Clasification::all();
        return view('events.create',compact('organizations','clasifications'));
    }
    public function create_event(Request $request)
    {   
        $request->start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
        $request->end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
        $input = $request->all();
        $request->validate([
            'name'=>'required|min:3',
            'type'=>'required',
            'start_date'=>'required',
            'end_date'=>'required|after:start_date',
            'description'=>'required',
            'location'=>'required',
            'organizer'=>"required",
            'clasification'=>'required',
            'lat'=>'required',
            'long'=>'required'
        ]);

        $imageName=null;
        if(isset($input['main_image'])){
            $imageName = time().'.'.$request->main_image->extension();
            $request->main_image->move(public_path('images/eventos/'), $imageName);
            ImageOptimizer::optimize(public_path('images/eventos/').$imageName);
        }

        $event = Event::create([
            'type'=>$input["type"],
            'clasification_id'=>$input["clasification"],
            'name'=>$input["name"],
            'description'=>$input["description"],
            "start_date"=>date("Y-m-d H:i:s", strtotime($request->start_date)),
            "end_date"=>date("Y-m-d H:i:s", strtotime($request->end_date)),
            'location'=>$input["location"],
            'website'=>$input["website"],
            'external_link'=>$input["external_link"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'main_image'=>$imageName,
            'featured_event'=>isset($input['featured']) ? true : false,
            'published'=>isset($input['published']) ? true : false,
            //'results'=>'',
            'user_id'=>Auth::user()->id,
            'organizer_id'=>$input['organizer'],
            'lat' =>str_replace(',','.',$input['lat']),
            'long' => str_replace(',','.',$input['long'])
        ]);
        //falta lat y long
        return redirect()->route('admin.events');
        
        
    }
    public function edit_event($id)
    {
        $organizations = Organization::all();
        $clasifications = Clasification::all();
        return view('events.edit',['event'=>Event::find($id),'organizations'=>$organizations,'clasifications'=>$clasifications]);
    }
    public function update_event(Request $request)
    {
        $request->start_date = date("Y-m-d H:i:s", strtotime($request->start_date));
        $request->end_date = date("Y-m-d H:i:s", strtotime($request->end_date));
        $request->validate([
            'name'=>'required|min:3',
            'type'=>'required',
            'start_date'=>'required',
            'end_date'=>'required|after:start_date',
            'description'=>'required',
            'location'=>'required',
            'organizer'=>"required",
            'clasification'=>'required',
            'lat'=>'required',
            'long'=>'required'
        ]);
        $input = $request->all();
        $id=$input['id'];
        $ev = Event::find($id);
        $old_results =$ev->results;
        $imageName=$ev->main_image;
        if(isset($request->main_image)){
            $imageName = time().'.'.$request->main_image->extension();
            $request->main_image->move(public_path('images/eventos/'), $imageName);
            ImageOptimizer::optimize(public_path('images/eventos/').$imageName);
        }
        if(isset($input['published'])){
            if(!count($ev->categories)){
                return redirect()->route('admin.event.edit', ['id'=>$id,'msg'=>'No puede publicarse un evento sin al menos una modalidad existente']);
            }
        }

        $event = array(
            'type'=>$input["type"],
            'clasification_id'=>$input["clasification"],
            'name'=>$input["name"],
            'description'=>$input["description"],
            "start_date"=>date("Y-m-d H:i:s", strtotime($request->start_date)),
            "end_date"=>date("Y-m-d H:i:s", strtotime($request->end_date)),
            'location'=>$input["location"],
            'website'=>$input["website"],
            'external_link'=>$input["external_link"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'main_image'=>$imageName,
            'featured_event'=>isset($input['featured']) ? true : false,
            'published'=>isset($input['published']) ? true : false,
            'results'=>$input['results'],
            //'user_id'=>1,
            'organizer_id'=>$input['organizer'],
            'lat' =>str_replace(',','.',$input['lat']),
            'long' => str_replace(',','.',$input['long'])
        );
        DB::table('events')->where('id',$id)->update($event);

        if($input['results'] && $input['results']!='' && $old_results!=$input['results']){
            $inscriptos = EventInscripto::where('event_id',$ev->id)->get();
            foreach($inscriptos as $inscripto){
                Mail::send(['html'=>'mails.results'],['event_name'=>$ev->name,'event_id'=>$ev->id], function($message)
                {
                    $message->subject('Resultados de evento disponibles!');
                    $message->to($inscripto->user->email);
                });
            }
            
        }


        return redirect()->route('admin.event', ['id'=>$id]);
        
    }

    public function delete_event($id){
        return Event::destroy($id);
    }

    public function new_category(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|gt:0',
            'availability'=>'required|integer|gt:0',
            'age_from'=>'required|integer|gt:0',
            'age_to'=>'required|integer|gte:age_from',
            'gender'=>'required'
        ]);
        $input = $request->all();
        $category = Category::create([
            'name'=>$input['name'],
            'price'=>$input['price'],
            'availability'=>$input['availability'],
            'age_to'=>$input['age_to'],
            'age_from'=>$input['age_from'],
            'gender'=>$input['gender'],
            'event_id'=>$input['event']
        ]);
        return redirect()->route('admin.event', ['id'=>$input['event']]);

    }
    public function update_category(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|gt:0',
            'availability'=>'required|integer|gt:0',
            'age_from'=>'required|integer|gt:0',
            'age_to'=>'required|integer|gte:age_from',
            'gender'=>'required'
        ]);
        $input = $request->all();
        $category = Category::where('id',$request->id)->update([
            'name'=>$input['name'],
            'price'=>$input['price'],
            'availability'=>$input['availability'],
            'age_to'=>$input['age_to'],
            'age_from'=>$input['age_from'],
            'gender'=>$input['gender'],
        ]);
        $category= Category::find($request->id);
        return redirect()->route('admin.event', ['id'=>$category->event_id]);
    }
    public function delete_category($id){
        return Category::destroy($id);
    }
    public function new_cupon(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'discount_amount'=>'required|numeric|gt:0',
            'valid_from'=>'required|date',
            'valid_to'=>'nullable|date|after:valid_from',
            'usage_limit'=>'required|integer|gt:0'
        ]);
        $input = $request->all();
        $cupon = Cupon::create([
            'code'=>$input['code'],
            'discount_amount'=>$input['tipo-desc'] == 'Monto' ? $input['discount_amount'] : null,
            'percentage'=>$input['tipo-desc'] != 'Monto' ? $input['discount_amount'] : null,
            'valid_from'=>$input['valid_from'],
            'valid_to'=>$input['valid_to'],
            'usage_limit'=>$input['usage_limit'],
            'event_id'=>$input['event']
        ]);
        return redirect()->route('admin.event', ['id'=>$input['event']]);
        
    }
    public function update_cupon(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'discount_amount'=>'required|numeric|gt:0',
            'valid_from'=>'required|date',
            'valid_to'=>'nullable|date|after:valid_from',
            'usage_limit'=>'required|integer|gt:0'
        ]);
        $input = $request->all();
        $cupon = Cupon::where('id',$request->id)->update([
            'code'=>$input['code'],
            'discount_amount'=>$input['tipo-desc'] == 'Monto' ? $input['discount_amount'] : null,
            'percentage'=>$input['tipo-desc'] != 'Monto' ? $input['discount_amount'] : null,
            'valid_from'=>$input['valid_from'],
            'valid_to'=>$input['valid_to'],
            'usage_limit'=>$input['usage_limit'],
        ]);
        $cupon= Cupon::find($request->id);
        return redirect()->route('admin.event', ['id'=>$cupon->event_id]);
    }
    public function delete_cupon($id){
        return Cupon::destroy($id);
    }
    public function new_question(Request $request)
    {
        $request->validate([
            'content'=>'required',
            'category'=>'required'
        ]);
        $input = $request->all();
        $question = Question::create([
            'type'=>$input['type'],
            'content'=>$input['content'],
            'options'=> $input['type']==3 ? $input['options'] : null,
            'required'=>$input['required'],
            'order'=>$input['order'],
            'event_id'=>$input['event'],
            'category_id'=>$input['category'] == 0 ? null: $input['category']
        ]);
        return redirect()->route('admin.event', ['id'=>$input['event']]);
    }
    public function update_question(Request $request)
    {
        $request->validate([
            'content'=>'required',
            'category'=>'required'
        ]);
        $input = $request->all();
        $question = Question::where('id',$request->id)->update([
            'type'=>$input['type'],
            'content'=>$input['content'],
            'options'=> $input['type']==3 ? $input['options'] : null,
            'required'=>$input['required'],
            'order'=>$input['order'],
            'category_id'=>$input['category'] == 0 ? null: $input['category']
        ]);
        $question=Question::find($request->id);
        return redirect()->route('admin.event', ['id'=>$question->event_id]);
    }
    public function delete_question($id){
        return Question::destroy($id);
    }
    public function new_sponsor(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $input = $request->all();
        $imageName=null;
        if(isset($input['image'])){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/eventos/sponsors/'), $imageName);
            ImageOptimizer::optimize(public_path('images/eventos/sponsors/'). $imageName);
        }
        $sponsor = Sponsor::create([
            'name'=>$input['name'],
            'image'=>$imageName,
            'event_id'=>$input['event']
        ]);
        return redirect()->route('admin.event', ['id'=>$input['event']]);
        
    }
    public function update_sponsor(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $input = $request->all();
        $sponsor= Sponsor::find($request->id);
        $imageName=$sponsor->image;
        if(isset($input['image'])){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/eventos/sponsors/'), $imageName);
            
            ImageOptimizer::optimize(public_path('images/eventos/sponsors/').$imageName);
        }
        Sponsor::where('id',$request->id)->update([
            'name'=>$input['name'],
            'image'=>$imageName
        ]);
        return redirect()->route('admin.event', ['id'=>$sponsor->event_id]);
    }
    public function delete_sponsor($id){
        return Sponsor::destroy($id);
    }
    public function organizador_events(){
        $organizer = Organizer::where('user_id', Auth::user()->id)->first();
        return view('events.index',['events'=>Event::where('organizer_id', $organizer->id)->get()]);
    }
    public function inscripcion($id)
    {
        return view('events.inscripcion',['inscripcion'=>EventInscripto::find($id)]);
    }
    public function delete_inscripcion($id){
        $ei = EventInscripto::find($id);
        $ei->answers()->delete();
        return EventInscripto::destroy($id);
    }
    public function update_inscripcion(Request $request)
    {
        $input = $request->all();
        $ei= EventInscripto::find($request->id);
        
        EventInscripto::where('id',$request->id)->update([
            'estado'=>$input['estado']
        ]);
        return redirect()->route('admin.event', ['id'=>$ei->event_id]);
    }
}
