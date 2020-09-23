<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use App\Providers\SweetAlertServiceProvider;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::allows('manage-informations')) {
            $informations = \App\Information::paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $informations = \App\Information::where('title', 'LIKE', "%$filterKeyword%")->paginate(10);
            }

            return view('informations.index', ['informations' => $informations, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('manage-informations')) {
            return view('informations.create');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('manage-informations')) {
            \Validator::make($request->all(), [
                'title' => 'required',
                'desc' => 'required',
                'image' => 'required'
            ])->validate();

            $new_information = new \App\Information;
            $new_information->title = $request->get('title');
            $new_information->desc = $request->get('desc');
            $new_information->date = Carbon::now();
            $new_information->lokasi = $request->get('lokasi');
            $new_information->lat = $request->get('lat');
            $new_information->lng = $request->get('lng');

            if ($request->file('image')) {
                $file = $request->file('image')->store('images', 'public');
                $new_information->image = $file;
            }

            $new_information->save();

            alert()->success('Berita <b>' . $new_information->title . '</b> Berhasil dibuat', 'Berhasil')->autoclose(3000)->html();
            return redirect()->route('informations.index');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
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
        if (Gate::allows('manage-informations')) {
            $information = \App\Information::findOrFail($id);
            return view('informations.edit', ['information' => $information]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
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
        if (Gate::allows('manage-informations')) {
            \Validator::make($request->all(), [
                'title' => 'required',
                'desc' => 'required'
            ])->validate();

            $information = \App\Information::findOrFail($id);
            $information->title = $request->get('title');
            $information->desc = $request->get('desc');
            $information->date = Carbon::now();
            $information->lokasi = $request->get('lokasi');
            $information->lat = $request->get('lat');
            $information->lng = $request->get('lng');

            if ($request->file('image')) {
                if ($information->image && file_exists(storage_path('app/public' . $information->image))) {
                    \Storage::delete('public/' . $information->image);
                }
                $file = $request->file('image')->store('images', 'public');
                $information->image = $file;
            }

            $information->save();

            alert()->success('Berita ' . $information->title . ' Berhasil diubah', 'Berhasil')->autoclose(3000);
            return redirect()->route('informations.index');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::allows('manage-informations')) {
            $information = \App\Information::findOrFail($id);
            $information->delete();

            alert()->success('Berita ' . $information->title . ' Berhasil dihapus', 'Berhasil')->autoclose(3000);
            return redirect()->route('informations.index');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function seeAllInformations()
    {
        $informations = \App\Information::orderBy('created_at', 'DESC')->paginate(3);
        return view('informations.show', ['informations' => $informations]);
    }
}
