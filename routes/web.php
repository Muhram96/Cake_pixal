<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/tolls', function () {
        return view('tolls');
    })->name('/tolls');
    Route::POST('/changebackground', [\App\Http\Controllers\TollsController::class, 'RemoveBackground'])->name('/changebackground');
    Route::POST('/enhanceimage', [\App\Http\Controllers\TollsController::class, 'enhanceimage'])->name('/enhanceimage');
    Route::get('/unwanted', [\App\Http\Controllers\TollsController::class, 'unwanted'])->name('/unwanted');
     Route::POST('/api/unwantedremove', [\App\Http\Controllers\TollsController::class, 'RemoveUnwanted'])->name('/api/unwantedremove');
});
