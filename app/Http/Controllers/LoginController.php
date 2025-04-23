<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            Auth::user();
        }
    }
}
