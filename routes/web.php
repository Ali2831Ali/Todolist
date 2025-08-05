<?php


use App\Livewire\Sidebar;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::get('/',Sidebar::class);
Route::post('/submit-contact', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string',
        'description' => 'required|text',
    ]);

    $Task = Task::all();

    return response()->json(['message' => 'اطلاعات با موفقیت ذخیره شد', 'id' => $Task->id]);
});
