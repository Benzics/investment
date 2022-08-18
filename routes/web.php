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
use App\Http\Controllers\admin\InvestmentController as AdminInvestmentController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\WithdrawalController as AdminWithdrawalController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\InvestmentController;
use App\Http\Controllers\user\ReferralController;
use App\Http\Controllers\user\TestimonyController;
use App\Http\Controllers\user\TransactionController;
use App\Http\Controllers\user\WithdrawalController;
use App\Services\UserService;

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
 
    $user_service = new UserService();
    // check if user has a referrer and reward referrer
    if($ref = $user_service->get_profile($request->user()->id)?->referrer != 0)
    {
        $user_service->reward_referral($request->user()->id, $ref);
    }
    return redirect()->route('user.dashboard')->with('success', 'Your email has been verified.');
})->middleware(['auth', 'signed'])->name('verification.verify');

 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent! Please check your spam folder if you can\'t find message in your inbox.');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// user routes
Route::middleware(['auth', 'verified', 'investment.commission'])->name('user.')->prefix('user')->group(function(){

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/deposit', [DepositController::class, 'index'])->name('deposit');
    Route::get('/deposits', [DepositController::class, 'deposits'])->name('deposits');
    Route::post('/deposit', [DepositController::class, 'store']);
    Route::post('/deposit-fund', [DepositController::class, 'deposit']);
    Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdraw');
    Route::get('/withdrawals', [WithdrawalController::class, 'withdrawals'])->name('withdrawals');
    Route::post('/withdrawal', [WithdrawalController::class, 'withdraw']);
    Route::get('/new-investment', [InvestmentController::class, 'index'])->name('new_investment');
    Route::post('/new-investment', [InvestmentController::class, 'preview']);
    Route::post('/invest', [InvestmentController::class, 'invest']);
    Route::get('/investments', [InvestmentController::class, 'investments'])->name('investments');
    Route::get('/transaction-log', [TransactionController::class, 'index']);
    Route::get('/profits', [TransactionController::class, 'profits']);
    Route::get('/referrals', [ReferralController::class, 'index']);
    Route::get('/testimony', [TestimonyController::class, 'index']);
    Route::post('/testimony', [TestimonyController::class, 'store']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/edit-profile', [ProfileController::class, 'profile']);
    Route::post('/edit-profile', [ProfileController::class, 'store']);
    Route::post('/image-upload', [ProfileController::class, 'photo']);
    Route::get('/change-password', [ProfileController::class, 'password']);
    Route::post('/change-password', [ProfileController::class, 'change_password']);
    Route::get('/trade-view', [ProfileController::class, 'trade_view']); 
});

// admin routes
Route::middleware(['auth', 'isadmin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/fund-wallet', [AdminDepositController::class, 'index'])->name('deposit');
    Route::post('/fund-wallet', [AdminDepositController::class, 'store']);
    Route::get('/deposits', [AdminDepositController::class, 'deposits'])->name('deposits');
    Route::get('/deposits/approve/{id}', [AdminDepositController::class, 'approve'])->where('id', '[0-9]+');
    Route::get('/deposits/decline/{id}', [AdminDepositController::class, 'decline'])->where('id', '[0-9]+');
    Route::post('/deposits/delete', [AdminDepositController::class, 'delete']);
    Route::get('/user-investments', [AdminInvestmentController::class, 'investments']);
    Route::get('/withdrawals', [AdminWithdrawalController::class, 'index']);
    Route::get('/withdrawals/approve/{id}', [AdminWithdrawalController::class, 'approve'])->where('id', '[0-9]+');
    Route::get('/withdrawals/decline/{id}', [AdminWithdrawalController::class, 'decline'])->where('id', '[0-9]+');

    Route::resources([
        '/users' => UserController::class,
        '/investments' => AdminInvestmentController::class,
    ]);
});