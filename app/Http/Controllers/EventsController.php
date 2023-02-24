<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;
use App\Models\Cupon;
use App\Models\Question;
use App\Models\Organization;
use App\Models\Organizer;
use App\Models\Clasification;

class EventsController extends Controller
{
    public function index()
    {
        return view('events.index',['events'=>Event::all()]);
    }
    public function event($id)
    {
        $event_inscriptos = EventInscripto::where('event_id',$id)->get();
        $inscriptos = DB::table('event_inscriptos')->select(['event_inscriptos.id as inscripcion_id','event_inscriptos.event_id','users.name as name', 'event_inscriptos.user_id', 'users.email as email','categories.name as categoria'])
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
        // hacer validaciones
        $input = $request->all();
        echo $input['organizer'];

        $request->validate([
            'main_image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->main_image->extension();
        $request->main_image->move(public_path('images/eventos/'), $imageName);

        $event = Event::create([
            'type'=>$input["type"],
            'clasification_id'=>$input["clasification"],
            'name'=>$input["name"],
            'description'=>$input["description"],
            "start_date"=>$input["start_date"],
            "end_date"=>$input["end_date"],
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
            'organizer_id'=>$input['organizer']
        ]);
        // falta main image y location
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
        // hacer validaciones
        $input = $request->all();
        $id=$input['id'];
        $ev = Event::find($id);
        $imageName=$ev->main_image;
        if(isset($request->main_image)){
            $imageName = time().'.'.$request->main_image->extension();
            $request->main_image->move(public_path('images/eventos/'), $imageName);
        }
        if(isset($input['published'])){
            if(!count($ev->categories)){
                return redirect()->route('admin.event.edit', ['id'=>$id,'msg'=>'No puede publicarse un evento sin al menos una categoría existente']);
            }
        }

        
        $event = array(
            'type'=>$input["type"],
            'clasification_id'=>$input["clasification"],
            'name'=>$input["name"],
            'description'=>$input["description"],
            //"start_date"=>$input["start_date"],
            //"end_date"=>$input["end_date"],
            'location'=>$input["location"],
            'website'=>$input["website"],
            'external_link'=>$input["external_link"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'main_image'=>$imageName,
            'featured_event'=>isset($input['featured']) ? true : false,
            'published'=>isset($input['published']) ? true : false,
            //'results'=>'',
            //'user_id'=>1,
            'organizer_id'=>$input['organizer']
        );
        // falta  user creador
        DB::table('events')->where('id',$id)->update($event);
        return redirect()->route('admin.event', ['id'=>$id]);
        
    }

    public function delete_event($id){
        return Event::destroy($id);
    }

    public function new_category(Request $request)
    {
        // hacer validaciones
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
        // hacer validaciones
        $input = $request->all();
        $cupon = Cupon::create([
            'code'=>$input['code'],
            'discount_amount'=>$input['discount_amount'],
            'percentage'=>$input['percentage'],
            'valid_from'=>$input['valid_from'],
            'valid_to'=>$input['valid_to'],
            'usage_limit'=>$input['usage_limit'],
            'event_id'=>$input['event']
        ]);
        return redirect()->route('admin.event', ['id'=>$input['event']]);
        
    }
    public function update_cupon(Request $request)
    {
        $input = $request->all();
        $cupon = Cupon::where('id',$request->id)->update([
            'code'=>$input['code'],
            'discount_amount'=>$input['discount_amount'],
            'percentage'=>$input['percentage'],
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
        // hacer validaciones
        $input = $request->all();
        $question = Question::create([
            'type'=>$input['type'],
            'content'=>$input['content'],
            'options'=> $input['type']==3 ? $input['options'] : null,
           'required'=>$input['required'],
            'order'=>$input['order'],
            'event_id'=>$input['event']
        ]);
        return redirect()->route('admin.event', ['id'=>$input['event']]);
    }
    public function update_question(Request $request)
    {
        $input = $request->all();
        $question = Question::where('id',$request->id)->update([
            'type'=>$input['type'],
            'content'=>$input['content'],
            'options'=> $input['type']==3 ? $input['options'] : null,
            'required'=>$input['required'],
            'order'=>$input['order']
        ]);
        $question=Question::find($request->id);
        return redirect()->route('admin.event', ['id'=>$question->event_id]);
    }
    public function delete_question($id){
        return Question::destroy($id);
    }
    public function organizador_events(){
        $organizer = Organizer::where('user_id', Auth::user()->id)->first();
        return view('events.index',['events'=>Event::where('organizer_id', $organizer->id)->get()]);
    }
    public function inscripcion($id)
    {
        return view('events.inscripcion',['inscripcion'=>EventInscripto::find($id)]);
    }
}
