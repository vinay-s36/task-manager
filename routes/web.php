<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api/tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->middleware('web');
    Route::post('/', [TaskController::class, 'store'])->middleware('web');
    Route::get('/{id}', [TaskController::class, 'show'])->middleware('web');
    Route::put('/{id}', [TaskController::class, 'update'])->middleware('web');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->middleware('web');
})->middleware('web');