<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
})->name('dashboard');



//route::get('/register',[RegisterController::class,'view']);
route::get('/task/create',[TaskController::class,'create']);
route::get('/task',[TaskController::class,'index'])->name('task.index');
route::get('/category',[CategoryController::class,'index'])->name('category.index');
route::get('/Setting',function(){dd('soon');})->name('Setting');
route::get('/Help',function(){dd('soon');})->name('Help');
