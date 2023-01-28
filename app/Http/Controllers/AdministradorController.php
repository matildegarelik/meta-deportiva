<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\EventInscripto;
use App\Models\Category;

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
   
}
