<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function createp(){
        return view("login.create");
    }

    public function store(Request $request){
        $request->validate([
            'nomP' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            "name" => $request->nomP,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('main.home')->with('success', 'Account created successfully! Welcome.');
    }
}
