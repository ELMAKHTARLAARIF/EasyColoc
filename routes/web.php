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
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AdminController;


Route::middleware('auth')->group(function () {
    Route::get('home', function () {
        return View('Home.home');
    })->name('home');
    Route::post('/join', [ColocMemberController::class, 'join'])->name('invitation.join');
    Route::get('colocation', function () {
        return view('Owner.Colocation');
    })->name('colocation');

    Route::post('colocation/create', [ColocationController::class, 'create'])->name('create');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('Member')->group(function () {


    Route::get('Owner/dashboard', [OwnerController::class, 'showOwnerDashboard'])->name('Owner_dashboard');
    Route::delete('colocation/{id}', [ColocationController::class, 'colocations_destroy'])->name('colocations_destroy');
    Route::post('colocation/{id}/invite', [ColocMemberController::class, 'invite'])->name('colocations_invite');
    Route::get(
        'accept_invitation/{token}',
        [ColocMemberController::class, 'acceptInvitation']
    )->name('accept_invitation');
    Route::post('depense/create', [DepenseController::class, 'create'])->name('create_depense');
    Route::get('depenses', [DepenseController::class, 'show'])->name('depenses');
    Route::put('depenses/{id}/edit', [DepenseController::class, 'update'])->name('expenses_edit');
    Route::get('depenses/{id}/delete', [DepenseController::class, 'destroy'])->name('expenses_delete');
    Route::post('depenses/{id}/markAsPaid', [PaymentController::class, 'markAsPaid'])->name('depense_markAsPaid');
});
Route::post('login', [AuthController::class, 'CheckloginData'])->name('CheckloginData');
Route::post('user/store', [AuthController::class, 'store_user'])->name('store_user');
Route::get('/', function () {
    return view('Auth.login');
})->name('login');
Route::get('register', function () {
    return view('Auth.Register');
})->name('register');
Route::get('Join', function () {
    return view('Home.FromJoin');
})->name('join');

Route::get('Admin/dashboard',[AdminController::class,'show'])->name('Admin_dashboard');

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::post('user/{user}/bani', [AdminController::class, 'user_ban'])->name('user_ban');
    Route::delete('user/{user}/debani', [AdminController::class, 'user_debanir'])->name('user_debanir');
    
});