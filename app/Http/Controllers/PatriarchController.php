<?php

namespace App\Http\Controllers;

use App\Exports\PatriarchReport;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Excel;
use App\Providers\SweetAlertServiceProvider;

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
            'status' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'nik' => 'required',
            'rt' => 'required',
        ])->validate();

        $new_patriarches = new \App\Patriarch;
        $new_patriarches->nama = $request->get('nama');
        $new_patriarches->nomor_kk = $request->get('nomor_kk');
        $new_patriarches->tanggal_lahir = $request->get('tanggal_lahir');
        $new_patriarches->no_hp = $request->get('no_hp');
        $new_patriarches->status = $request->get('status');
        $new_patriarches->tempat_lahir = $request->get('tempat_lahir');
        $new_patriarches->agama = $request->get('agama');
        $new_patriarches->pekerjaan = $request->get('pekerjaan');
        $new_patriarches->pendidikan = $request->get('pendidikan');
        $new_patriarches->nik = $request->get('nik');
        $new_patriarches->rt = $request->get('rt');


        $new_patriarches->save();

        alert()->success('Kepala Keluarga <b>' . $new_patriarches->nama . '</b> Berhasil ditambahkan', 'Berhasil')->autoclose(3000)->html();
        return redirect()->route('patriarches.index');
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
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|digits_between:10,13',
            'status' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'nik' => 'required',
            'rt' => 'required',
            'rw' => 'required',
        ])->validate();

        $patriarche = \App\Patriarch::findOrFail($id);
        $patriarche->nama = $request->get('nama');
        $patriarche->nomor_kk = $request->get('nomor_kk');
        $patriarche->tanggal_lahir = $request->get('tanggal_lahir');
        $patriarche->no_hp = $request->get('no_hp');
        $patriarche->status = $request->get('status');
        $patriarche->tempat_lahir = $request->get('tempat_lahir');
        $patriarche->agama = $request->get('agama');
        $patriarche->pekerjaan = $request->get('pekerjaan');
        $patriarche->pendidikan = $request->get('pendidikan');
        $patriarche->nik = $request->get('nik');
        $patriarche->rt = $request->get('rt');
        $patriarche->rw = $request->get('rw');

        $patriarche->save();

        alert()->success('Kepala Keluarga <b>' . $patriarche->nama . '</b> Berhasil diubah', 'Berhasil')->autoclose(3000)->html();
        return redirect()->route('patriarches.index');
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

        alert()->success('Kepala Keluarga <b>' . $patriarch->nama . '</b> Berhasil dihapus', 'Berhasil')->autoclose(3000)->html();
        return redirect()->route('patriarches.index');
    }

    public function exportPdf()
    {
        $patriarches = \App\Patriarch::all();
        $no = 1;
        $pdf = PDF::loadview('pdf.patriarches', ['patriarches' => $patriarches, 'nomor' => $no]);
        //$pdf->save(storage_path().'_filename.pdf');
        return $pdf->stream('patriarches.pdf');
    }

    public function exportExcel()
    {
        $nama_file = 'Data Kepala Keluarga ' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new PatriarchReport, $nama_file);
    }
}
