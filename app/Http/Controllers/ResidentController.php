<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $residents = DB::table('residents')
            ->select('residents.id', 'residents.nama', 'residents.rt', 'residents.rw', 'residents.status_kependudukan', 'patriarches.nomor_kk')
            ->join('patriarches', 'patriarches.id', '=', 'residents.id')
            ->paginate(10);
        $no = 1;

        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $residents = DB::table('residents')
                ->select('residents.id', 'residents.nama', 'residents.rt', 'residents.rw', 'residents.status_kependudukan', 'patriarches.nomor_kk')
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('patriarches.nomor_kk', 'LIKE', "%$filterKeyword%")
                ->paginate(10);
        }

        return view('residents.index', ['residents' => $residents, 'nomor' => $no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('residents.create');
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
            'nama' => 'required',
            'rt' => 'required',
            'status_perkawinan' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required'
        ])->validate();

        $new_resident = new \App\Resident;
        $new_resident->nama = $request->get('nama');
        $new_resident->rt = $request->get('rt');
        $new_resident->status_perkawinan = $request->get('status_perkawinan');
        $new_resident->tanggal_lahir = $request->get('tanggal_lahir');
        $new_resident->no_telp = $request->get('no_telp');
        $new_resident->patriarch_id = $request->get('patriarch_id');

        $new_resident->save();
        return redirect()->route('residents.index')->with('success', 'Data penduduk baru berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = \App\Resident::with('patriarches')->findOrFail($id);
        return view('residents.show', ['resident' => $resident]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resident = \App\Resident::findOrFail($id);
        $patriarches = \App\Patriarch::pluck('nomor_kk', 'id')->toArray();

        return view('residents.edit')->with(compact('resident', 'patriarches'));
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
            'nama' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'status_perkawinan' => 'required',
            'status_kependudukan' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required'
        ])->validate();

        $resident = \App\Resident::findOrFail($id);
        $resident->nama = $request->get('nama');
        $resident->rt = $request->get('rt');
        $resident->rw = $request->get('rw');
        $resident->status_perkawinan = $request->get('status_perkawinan');
        $resident->status_kependudukan = $request->get('status_kependudukan');
        $resident->tanggal_lahir = $request->get('tanggal_lahir');
        $resident->no_telp = $request->get('no_telp');
        $resident->patriarch_id = $request->get('patriarch_id');

        $resident->save();
        return redirect()->route('residents.index')->with('success', 'Data penduduk baru berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resident = \App\Resident::findOrFail($id);
        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Data penduduk baru berhasil di hapus');
    }

    public function trash()
    {
        $deleted_residents = \App\Resident::onlyTrashed()->paginate(10);
        $no = 1;
        return view('residents.trash', ['residents' => $deleted_residents, 'nomor' => $no]);
    }

    public function restore($id)
    {
        $resident = \App\Resident::withTrashed()->findOrFail($id);

        if ($resident->trashed()) {
            $resident->restore();
        } else {
            return redirect()->route('residents.index')->with('success', 'Data penduduk tidak di temukan');
        }

        return redirect()->route('residents.index')->with('success', 'Data penduduk berhasil di pulihkan');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');

        $patriarches = \App\Patriarch::where("nomor_kk", "LIKE", "%$keyword%")->get();

        return $patriarches;
    }
}
