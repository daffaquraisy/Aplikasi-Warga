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
        $getP = ['status' => 'Hidup'];
        $patriarches = \App\Patriarch::where($getP)->count();
        $residents = \App\Resident::whereNull('deleted_at')->count();
        $join = $patriarches + $residents;

        return view('home')->with(compact('residents', 'patriarches', 'join'));
    }
}
