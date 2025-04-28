<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index/index');
});


route::get('/register',[RegisterController::class,'view']);
