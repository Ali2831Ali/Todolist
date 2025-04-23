<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        User::create([
            'name' => $request->username,
            'password' => $request->password,
            'email' => $request->email
        ]);
    }

    public function view(){
        return view('register/index');
    }

}
