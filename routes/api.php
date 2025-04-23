<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



route::post('/register',[RegisterController::class,'index']);
route::post('/login',[LoginController::class,'index']);
