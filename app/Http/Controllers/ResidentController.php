<?php

namespace App\Http\Controllers;

use App\Exports\ResidentReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;


class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if (Gate::allows('manage-residents')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where('patriarches.nomor_kk', 'LIKE', "%$filterKeyword%")
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.index', ['residents' => $residents, 'nomor' => $no]);
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
        if (Gate::allows('manage-residents')) {
            return view('residents.create');
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
        if (Gate::allows('manage-residents')) {
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
        if (Gate::allows('manage-residents')) {
            $resident = \App\Resident::findOrFail($id);
            $patriarches = \App\Patriarch::pluck('nomor_kk', 'id')->toArray();

            return view('residents.edit')->with(compact('resident', 'patriarches'));
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
        if (Gate::allows('manage-residents')) {
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
        if (Gate::allows('manage-residents')) {
            $resident = \App\Resident::findOrFail($id);
            $resident->delete();

            return redirect()->route('residents.index')->with('success', 'Data penduduk baru berhasil di hapus');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function trash()
    {
        if (Gate::allows('manage-residents')) {
            $deleted_residents = \App\Resident::onlyTrashed()->paginate(10);
            $no = 1;
            return view('residents.trash', ['residents' => $deleted_residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function restore($id)
    {
        if (Gate::allows('manage-residents')) {
            $resident = \App\Resident::withTrashed()->findOrFail($id);

            if ($resident->trashed()) {
                $resident->restore();
            } else {
                return redirect()->route('residents.index')->with('success', 'Data penduduk tidak di temukan');
            }

            return redirect()->route('residents.index')->with('success', 'Data penduduk berhasil di pulihkan');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');

        $patriarches = \App\Patriarch::where("nomor_kk", "LIKE", "%$keyword%")->get();

        return $patriarches;
    }

    public function exportPdf()
    {
        if (Gate::allows('manage-residents')) {
            $residents = \App\Resident::all();
            $no = 1;
            $pdf = PDF::loadview('pdf.residents', ['residents' => $residents, 'nomor' => $no]);
            //$pdf->save(storage_path().'_filename.pdf');
            return $pdf->stream('residents.pdf');
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function exportExcel()
    {
        if (Gate::allows('manage-residents')) {
            $nama_file = 'Data Penduduk RW 2, ' . date('Y-m-d_H-i-s') . '.xlsx';
            return Excel::download(new ResidentReport, $nama_file);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt1(Request $request)
    {
        if (Gate::allows('see-rt1')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '01')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '01']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt1', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt2(Request $request)
    {
        if (Gate::allows('see-rt2')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '02')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '02']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt2', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt3(Request $request)
    {
        if (Gate::allows('see-rt3')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '03')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '03']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt3', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt4(Request $request)
    {
        if (Gate::allows('see-rt4')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '04')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '04']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt4', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt5(Request $request)
    {
        if (Gate::allows('see-rt5')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '05')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '05']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt5', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt6(Request $request)
    {
        if (Gate::allows('see-rt1')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '06')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '06']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt6', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }

    public function queryByRt7(Request $request)
    {
        if (Gate::allows('see-rt7')) {
            $residents = DB::table('residents')
                ->select(
                    'residents.id',
                    'residents.nama',
                    'residents.rt',
                    'residents.rw',
                    'residents.tanggal_lahir',
                    'residents.status_kependudukan',
                    'patriarches.nomor_kk'
                )
                ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                ->where('rt', '=', '07')
                ->orderBy('residents.tanggal_lahir', 'ASC')
                ->paginate(10);
            $no = 1;

            $filterKeyword = $request->get('keyword');
            if ($filterKeyword) {
                $residents = DB::table('residents')
                    ->select(
                        'residents.id',
                        'residents.nama',
                        'residents.rt',
                        'residents.rw',
                        'residents.tanggal_lahir',
                        'residents.status_kependudukan',
                        'residents.tanggal_lahir',
                        'patriarches.nomor_kk'
                    )
                    ->join('patriarches', 'patriarches.id', '=', 'residents.id')
                    ->where([
                        ['patriarches.nomor_kk', 'LIKE', "%$filterKeyword%"],
                        ['residents.rt', '=', '07']
                    ])
                    ->orderBy('residents.tanggal_lahir', 'ASC')
                    ->paginate(10);
            }

            return view('residents.rt.rt7', ['residents' => $residents, 'nomor' => $no]);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }
}
