<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\user\DepositController;

// admin
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\DepositController as AdminDepositController;
use App\Http\Controllers\user\WithdrawalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/register', [RegistrationController::class, 'index'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/get-started', function(){
    return view('get-started', ['title' => 'Get Started']);
});


Route::get('/admin/login', [AdminLoginController::class, 'index']);
Route::post('/admin/login', [AdminLoginController::class, 'authenticate']);

Route::get('/email/verify', function () {
    return view('auth.verify-email', ['title' => 'Verify Email']);
})->middleware('auth')->name('verification.notice');
;
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect()->route('user.dashboard')->with('success', 'Your email has been verified.');
})->middleware(['auth', 'signed'])->name('verification.verify');

 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent! Please check your spam folder if you can\'t find message in your inbox.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// user routes
Route::middleware(['auth', 'verified'])->name('user.')->prefix('user')->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::post('/deposit', [DepositController::class, 'store']);
    Route::post('/deposit-fund', [DepositController::class, 'deposit']);
    Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdraw');
    Route::post('/withdrawal', [WithdrawalController::class, 'withdraw']);
});

// admin routes
Route::middleware(['auth', 'isadmin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/fund-wallet', [AdminDepositController::class, 'index'])->name('deposit');
    Route::post('/fund-wallet', [AdminDepositController::class, 'store']);
    Route::get('/deposits', [AdminDepositController::class, 'deposits'])->name('deposits');
});