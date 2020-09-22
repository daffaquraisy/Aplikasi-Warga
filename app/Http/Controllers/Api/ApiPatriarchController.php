<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Patriarch;
use Illuminate\Http\Request;

class ApiPatriarchController extends Controller
{
    public function index()
    {
        $patriarches = Patriarch::paginate(10);
        return response()->json($patriarches, 200);
    }

    public function create(Request $request)
    {
        $new_patriarches = new Patriarch;
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
        $new_patriarches->status_bantuan = $request->get('status_bantuan');

        $new_patriarches->save();
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $patriarche = Patriarch::findOrFail($id);
        return response()->json(['data' => $patriarche], 200);
    }

    public function update(Request $request, $id)
    {
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
        $patriarche->status_bantuan = $request->get('status_bantuan');

        $patriarche->save();
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $patriarch = Patriarch::findOrFail($id);
        $patriarch->delete();

        return response()->json(['success' => true]);
    }
}
