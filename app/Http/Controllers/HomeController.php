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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patriarches = \App\Patriarch::count();
        $residents = \App\Resident::count();
        return view('home', ['patriarches' => $patriarches, 'residents' => $residents]);
    }
}
