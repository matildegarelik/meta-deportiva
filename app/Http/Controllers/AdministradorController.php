<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;
use App\Models\Organization;

use DB;

class AdministradorController extends Controller
{
    public function index()
    {
        $total_events = count(Event::all());
        $total_participantes = count(User::all()->where('role_id',1));
        $total_org = count(Organization::all());
        return view('administrador.index', compact('total_events', 'total_participantes','total_org'));
    }

    public function users()
    {
        return view('administrador.users',['users'=>User::all()]);
    }
   
}
