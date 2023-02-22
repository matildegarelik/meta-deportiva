<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Organization;
use App\Models\Organizer;

use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function userHome()
    {
        return view('home',["msg"=>"I am user role"]);
    }

    public function organizadorHome()
    {
        //return view('home',["msg"=>"I am Organizador role"]);
        $user_id= Auth::user()->id;
        $org = Organizer::where('user_id',$user_id)->first();
        $my_events = count(Event::where('organizer_id', $org->id)->get());
        $published_events = count(Event::where('organizer_id', $org->id)->where('published',1)->get());
        $total_registros = DB::table('organizers')->select(['organizers.id'])->join('events','events.organizer_id','=','organizers.id')->join('event_inscriptos','event_inscriptos.event_id','=','events.id')->where('organizers.id',$org->id)->count();
        $my_org = Organization::find($org->organization_id);
        return view('organizador.index',compact('my_events','published_events','total_registros','my_org'));
    }

    public function adminHome()
    {
        return view('home',["msg"=>"I am Admin role"]);
    }
}
