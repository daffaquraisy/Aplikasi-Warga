<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = \App\Information::paginate(10);
        $no = 1;
        return view('informations.index', ['informations' => $informations, 'nomor' => $no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('informations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
        ])->validate();

        $new_information = new \App\Information;
        $new_information->title = $request->get('title');
        $new_information->desc = $request->get('desc');
        $new_information->date = Carbon::now();

        $new_information->save();
        return redirect()->route('informations.index')->with('success', 'Berita baru telah di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = \App\Information::findOrFail($id);
        return view('informations.edit', ['information' => $information]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'title' => 'required',
            'desc' => 'required'
        ])->validate();

        $information = \App\Information::findOrFail($id);
        $information->title = $request->get('title');
        $information->desc = $request->get('desc');
        $information->date = Carbon::now();

        $information->save();
        return redirect()->route('informations.index')->with('success', 'Berita berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = \App\Information::findOrFail($id);
        $information->delete();

        return redirect()->route('informations.index')->with('success', 'Berita berhasil di hapus');
    }
}
