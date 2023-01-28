<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;

class EventsController extends Controller
{
    public function index()
    {
        return view('events.index',['events'=>Event::all()]);
    }
    public function event($id)
    {
        $event_inscriptos = EventInscripto::where('event_id',$id)->get();
        $inscriptos = DB::table('event_inscriptos')->select(['event_inscriptos.event_id','users.name as name', 'event_inscriptos.user_id', 'users.email as email'])
            ->join('users','users.id','=','event_inscriptos.user_id')->where('event_id',$id)->get();
        $categories = Category::where('event_id',$id)->get();
        return view('events.detail',['event'=>Event::find($id),'inscriptos'=>$inscriptos,'categories'=>$categories]);
    }
    public function new_event()
    {
        return view('events.create');
    }
    public function create_event(Request $request)
    {
        // hacer validaciones
        $input = $request->all();
        $event = array(
            'type'=>$input["type"],
            'clasification'=>$input["casification"],
            'name'=>$input["name"],
            'description'=>$input["description"],
            "start_date"=>$input["start_date"],
            "end_date"=>$input["end_date"],
            'location'=>$input["location"],
            'website'=>$input["website"],
            'external_link'=>$input["external_link"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'main_image'=>'',
            'featured_event'=>false,
            //'results'=>'',
            'user_id'=>1,
            //'organizer_id'=>1
        );
        // falta main image, featured event, user creador
        DB::table('events')->insert($event);
        return redirect()->route('admin.events');
        
    }
    public function edit_event($id)
    {
        return view('events.edit',['event'=>Event::find($id)]);
    }
    public function update_event(Request $request)
    {
        // hacer validaciones
        $input = $request->all();
        $id=$input['id'];
        $event = array(
            'type'=>$input["type"],
            'clasification'=>$input["casification"],
            'name'=>$input["name"],
            'description'=>$input["description"],
            //"start_date"=>$input["start_date"],
            //"end_date"=>$input["end_date"],
            'location'=>$input["location"],
            'website'=>$input["website"],
            'external_link'=>$input["external_link"],
            'fb_page'=>$input["fb_page"],
            'ig_page'=>$input["ig_page"],
            'main_image'=>'',
            'featured_event'=>false,
            //'results'=>'',
            'user_id'=>1,
            //'organizer_id'=>1
        );
        // falta main image, featured event, user creador
        DB::table('events')->where('id',$id)->update($event);
        return redirect()->route('admin.event', ['id'=>$id]);
        
    }
}
