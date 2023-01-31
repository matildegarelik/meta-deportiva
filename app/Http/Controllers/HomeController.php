<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('organizador.index');
    }

    public function adminHome()
    {
        return view('home',["msg"=>"I am Admin role"]);
    }
}
