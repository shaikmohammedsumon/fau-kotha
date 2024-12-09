<?php

use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Dashboard
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::post('/profile/name',[ProfileController::class,'name'])->name('profile.name');
Route::post('/profile/password',[ProfileController::class,'password'])->name('profile.password');


