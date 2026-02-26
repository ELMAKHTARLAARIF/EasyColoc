<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ColocMemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepenseController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\Mail as MailMessage;

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('register', function () {
    return view('Auth.Register');
})->name('register');
Route::get('home',function (){
    return View('Home.home');
})->name('home');
Route::get('colocation', function () {
    return view('Owner.Colocation');
})->name('colocation');
Route::post('colocation/create',[ColocationController::class,'create'])->name('create');
Route::get('/Colocation', [ColocationController::class, 'show'])->name('MaColocation');
Route::post('user/store',[AuthController::class,'store_user'])->name('store_user');
Route::post('login',[AuthController::class,'CheckloginData'])->name('CheckloginData');
Route::get('Member/dashboard', function () {
    return view('Member.dashboard');
})->name('Member_dashboard');
Route::get('Owner/dashboard',[ColocationController::class,'showOwnerDashboard'])->name('Owner_dashboard');
//delete colocation
Route::delete('colocation/{id}', [ColocationController::class, 'colocations_destroy'])->name('colocations_destroy');

//->middleware(['auth'])->name('dashboard');