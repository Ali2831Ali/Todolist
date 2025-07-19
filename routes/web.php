<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('dashboard.index');
});


//route::get('/register',[RegisterController::class,'view']);
route::get('/task/create',[TaskController::class,'create']);
route::get('/task',[TaskController::class,'index']);

