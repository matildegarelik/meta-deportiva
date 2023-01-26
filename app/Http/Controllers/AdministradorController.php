<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

use DB;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('administrador.index');
    }

    public function users()
    {
        return view('administrador.users',['users'=>User::all()]);
    }

    /// EVENTS
    public function events()
    {
        return view('administrador.events.index',['events'=>Event::all()]);
    }
    public function event($id)
    {
        return view('administrador.events.detail',['event'=>Event::find($id)]);
    }
    public function new_event()
    {
        return view('administrador.events.create');
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
            'results'=>'',
            'user_id'=>1,
            'organizador_id'=>1
        );
        // falta main image, featured event, user creador
        DB::table('events')->insert($event);
        return redirect()->route('admin.events');
        
    }
    public function edit_event($id)
    {
        return view('administrador.events.edit',['event'=>Event::find($id)]);
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
            'results'=>'',
            'user_id'=>1,
            'organizador_id'=>1
        );
        // falta main image, featured event, user creador
        DB::table('events')->where('id',$id)->update($event);
        return redirect()->route('admin.event', ['id'=>$id]);
        
    }
}
