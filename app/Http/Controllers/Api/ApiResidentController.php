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

    public function create(Request $request)
    {
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
