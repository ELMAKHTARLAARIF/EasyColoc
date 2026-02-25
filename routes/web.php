<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ColocMemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepenseController;

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('register', function () {
    return view('Auth.Register');
})->name('register');
Route::post('user/store',[AuthController::class,'store_user'])->name('store_user');
Route::post('login',[AuthController::class,'CheckloginData'])->name('CheckloginData');
Route::get('Member/dashboard', function () {
    return view('Member.dashboard');
})->name('Member_dashboard');
Route::get('Owner/dashboard', function () {
    return view('Owner.dashboard');
})->name('Owner_dashboard');

//->middleware(['auth'])->name('dashboard');