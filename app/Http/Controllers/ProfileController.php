<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){

        $users = User::findOrFail(Auth::id());

        return view('profile.index', compact('users'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
        ]);

        $users = User::find($id);

        $users->name = $request->name;
        $users->username = $request->username;



        $users->save();

        return back()->with('sukses','Data profile berhasil diupdate.');
    }
}
