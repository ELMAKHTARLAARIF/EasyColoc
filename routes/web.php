<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ColocMemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mail as MailMessage;

Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('register', function () {
    return view('Auth.Register');
})->name('register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
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

Route::get('Owner/dashboard',[OwnerController::class,'showOwnerDashboard'])->name('Owner_dashboard');
//delete colocation
Route::delete('colocation/{id}', [ColocationController::class, 'colocations_destroy'])->name('colocations_destroy');
Route::post('colocation/{id}/invite', [ColocMemberController::class, 'invite'])->name('colocations_invite');
Route::get('accept_invitation/{token}',[ColocMemberController::class, 'acceptInvitation']
)->name('accept_invitation');
Route::post('depense/create',[DepenseController::class,'create'])->name('create_depense');
Route::get('depenses',[DepenseController::class,'show'])->name('depenses');