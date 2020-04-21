<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PatriarchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if (Gate::allows('manage-patriarches')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });
    }

    public function index(Request $request)
    {
        $patriarches = \App\Patriarch::paginate(10);
        $no = 1;

        $filterKeyword = $request->get('keyword');
        if ($filterKeyword) {
            $patriarches = \App\Patriarch::where('nama', 'LIKE', "%$filterKeyword%")->paginate(10);
        }

        return view('patriarches.index', ['patriarches' => $patriarches, 'nomor' => $no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patriarches.create');
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
            'nomor_kk' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|digits_between:10,13',
            'status' => 'required'
        ])->validate();

        $new_patriarches = new \App\Patriarch;
        $new_patriarches->nama = $request->get('nama');
        $new_patriarches->nomor_kk = $request->get('nomor_kk');
        $new_patriarches->tanggal_lahir = $request->get('tanggal_lahir');
        $new_patriarches->no_hp = $request->get('no_hp');
        $new_patriarches->status = json_encode($request->get('status'));

        $new_patriarches->save();
        return redirect()->route('patriarches.index')->with('success', 'Data kepala keluarga baru berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patriarche = \App\Patriarch::findOrFail($id);
        return view('patriarches.show', ['patriarche' => $patriarche]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patriarche = \App\Patriarch::findOrFail($id);
        return view('patriarches.edit', ['patriarche' => $patriarche]);
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
            'nomor_kk' => 'required',
            'tanggal_lahir' => 'required'
        ])->validate();

        $patriarche = \App\Patriarch::findOrFail($id);
        $patriarche->nama = $request->get('nama');
        $patriarche->nomor_kk = $request->get('nomor_kk');
        $patriarche->tanggal_lahir = $request->get('tanggal_lahir');
        $patriarche->no_hp = $request->get('no_hp');
        $patriarche->status = json_encode($request->get('status'));

        $patriarche->save();
        return redirect()->route('patriarches.index')->with('success', 'Data kepala keluarga berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patriarch = \App\Patriarch::findOrFail($id);
        $patriarch->delete();

        return redirect()->route('patriarches.index')->with('success', 'Data kepala keluarga berhasil di hapus');
    }
}
