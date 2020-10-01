<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Resident;
use Illuminate\Support\Facades\DB;

class ApiResidentController extends Controller
{
    public function index()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.nik',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'residents.status_perkawinan',
                'residents.no_telp',
                'residents.agama',
                'residents.rt',
                'residents.rw',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
                'residents.tanggal_lahir',
                'residents.pekerjaan',
                'residents.pendidikan',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->whereNull('deleted_at')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt1()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '01')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt2()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '02')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt3()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '03')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt4()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '04')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt5()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '05')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt6()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '06')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function getRt7()
    {
        $residents = DB::table('residents')
            ->select(
                'residents.id',
                'residents.nama',
                'residents.tanggal_lahir',
                'residents.status_kependudukan',
                'patriarches.nomor_kk',
                'residents.tempat_lahir',
            )
            ->leftJoin('patriarches', 'patriarches.id', '=', 'residents.patriarch_id')
            ->where('residents.rt', '=', '07')
            ->whereNull('deleted_at')
            ->orderBy('residents.tanggal_lahir', 'ASC')
            ->paginate(10);
        return response()->json($residents, 200);
    }

    public function create(Request $request)
    {
        \Validator::make($request->all(), [
            'nama' => 'required',
            'rt' => 'required',
            'status_perkawinan' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'nik' => 'required'
        ])->validate();

        $new_resident = new Resident;
        $new_resident->nama = $request->get('nama');
        $new_resident->rt = $request->get('rt');
        $new_resident->status_perkawinan = $request->get('status_perkawinan');
        $new_resident->tanggal_lahir = $request->get('tanggal_lahir');
        $new_resident->no_telp = $request->get('no_telp');
        $new_resident->patriarch_id = $request->get('patriarch_id');
        $new_resident->tempat_lahir = $request->get('tempat_lahir');
        $new_resident->agama = $request->get('agama');
        $new_resident->pekerjaan = $request->get('pekerjaan');
        $new_resident->pendidikan = $request->get('pendidikan');
        $new_resident->nik = $request->get('nik');

        $new_resident->save();
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $resident = Resident::findOrFail($id);
        return response()->json(['data' => $resident], 200);
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'nama' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'status_perkawinan' => 'required',
            'status_kependudukan' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'pendidikan' => 'required',
            'nik' => 'required'
        ])->validate();

        $resident = Resident::findorFail($id);
        $resident->nama = $request->get('nama');
        $resident->rt = $request->get('rt');
        $resident->status_perkawinan = $request->get('status_perkawinan');
        $resident->status_kependudukan = $request->get('status_kependudukan');
        $resident->tanggal_lahir = $request->get('tanggal_lahir');
        $resident->no_telp = $request->get('no_telp');
        $resident->patriarch_id = $request->get('patriarch_id');
        $resident->tempat_lahir = $request->get('tempat_lahir');
        $resident->agama = $request->get('agama');
        $resident->pekerjaan = $request->get('pekerjaan');
        $resident->pendidikan = $request->get('pendidikan');
        $resident->nik = $request->get('nik');

        $resident->save();
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return response()->json(['success' => true]);
    }
}
