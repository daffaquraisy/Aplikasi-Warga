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

        $getRT1 = ['rt' => '01', 'status' => 'Hidup'];
        $p1 = \App\Patriarch::where($getRT1)->count();
        $r1 = \App\Resident::where('rt', '=', '01')->whereNull('deleted_at')->count();
        $j1 = $p1 + $r1;

        $getRT2 = ['rt' => '02', 'status' => 'Hidup'];
        $p2 = \App\Patriarch::where($getRT2)->count();
        $r2 = \App\Resident::where('rt', '=', '02')->whereNull('deleted_at')->count();
        $j2 = $p2 + $r2;

        $getRT3 = ['rt' => '03', 'status' => 'Hidup'];
        $p3 = \App\Patriarch::where($getRT3)->count();
        $r3 = \App\Resident::where('rt', '=', '03')->whereNull('deleted_at')->count();
        $j3 = $p3 + $r3;

        $getRT4 = ['rt' => '04', 'status' => 'Hidup'];
        $p4 = \App\Patriarch::where($getRT4)->count();
        $r4 = \App\Resident::where('rt', '=', '04')->whereNull('deleted_at')->count();
        $j4 = $p4 + $r4;

        $getRT5 = ['rt' => '05', 'status' => 'Hidup'];
        $p5 = \App\Patriarch::where($getRT5)->count();
        $r5 = \App\Resident::where('rt', '=', '05')->whereNull('deleted_at')->count();
        $j5 = $p5 + $r5;

        $getRT6 = ['rt' => '06', 'status' => 'Hidup'];
        $p6 = \App\Patriarch::where($getRT6)->count();
        $r6 = \App\Resident::where('rt', '=', '06')->whereNull('deleted_at')->count();
        $j6 = $p6 + $r6;

        $getRT7 = ['rt' => '07', 'status' => 'Hidup'];
        $p7 = \App\Patriarch::where($getRT7)->count();
        $r7 = \App\Resident::where('rt', '=', '07')->whereNull('deleted_at')->count();
        $j7 = $p7 + $r7;

        return view('home')->with(compact('residents', 'patriarches', 'join', 'p1', 'r1', 'j1', 'p2', 'r2', 'j2', 'p3', 'r3', 'j3', 'p4', 'r4', 'j4', 'p5', 'r5', 'j5', 'p6', 'r6', 'j6', 'p7', 'r7', 'j7'));
    }
}
