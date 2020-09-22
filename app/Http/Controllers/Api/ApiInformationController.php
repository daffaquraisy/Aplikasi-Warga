<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Carbon;

class ApiInformationController extends Controller
{
    public function index()
    {
        $informations = Information::paginate(10);
        return response()->json($informations, 200);
    }

    public function create(Request $request)
    {
        $new_information = new Information;
        $new_information->title = $request->get('title');
        $new_information->desc = $request->get('desc');
        $new_information->date = Carbon::now();

        if ($request->file('image')) {
            $file = $request->file('image')->store('images', 'public');
            $new_information->image = $file;
        }

        $new_information->save();
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $information = Information::findOrFail($id);
        return response()->json(['data' => $information], 200);
    }

    public function update(Request $request, $id)
    {
        $information = \App\Information::findOrFail($id);
        $information->title = $request->get('title');
        $information->desc = $request->get('desc');
        $information->date = Carbon::now();

        if ($request->file('image')) {
            if ($information->image && file_exists(storage_path('app/public' . $information->image))) {
                \Storage::delete('public/' . $information->image);
            }
            $file = $request->file('image')->store('images', 'public');
            $information->image = $file;
        }

        $information->save();
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $information = Information::findOrFail($id);
        $information->delete();

        return response()->json(['success' => true]);
    }
}
