<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return response()->json($users, 200);
    }

    public function create(Request $request)
    {
        \Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'roles' => 'required',
            'phone' => 'required|digits_between:10,13',
            'password' => 'required|min:6'
        ])->validate();

        $new_user = new User;
        $new_user->name = $request->get('name');
        $new_user->email = $request->get('email');
        $new_user->phone = $request->get('phone');
        $new_user->status = $request->get('status');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['data' => $user], 200);
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email',
            'roles' => 'required',
            'status' => 'required',
            'phone' => 'required|digits_between:10,13'
        ])->validate();

        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $user->phone = $request->get('phone');

        $user->save();
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['success' => true]);
    }
}
