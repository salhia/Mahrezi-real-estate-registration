<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\OpportunityController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/game', function () {
    return view('game');
})->name('game');

Route::get('/login',[AuthManager::class,'login'])->name('login');
Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');




Route::get('/logout',[AuthManager::class, 'logout' ])->name('logout');


// Route::get('/change-password', [AuthManager::class,'showChangePasswordForm'])->middleware('auth');
// Route::post('/change-password', [AuthManager::class,'changePassword'])->name('change.password')->middleware('auth');


// Route::middleware(['auth'])->group(function () {
//         Route::get('/change-password', [AuthManager::class,'showChangePasswordForm'])->name('change-password');
//         Route::post('/change-password', [AuthManager::class,'changePassword'])->name('change.password');
//     });

Route::middleware(['auth'])->group(function () {
    Route::get('/change-password', [AuthManager::class,'showChangePasswordForm'])->middleware('auth');
    Route::post('/change-password', [AuthManager::class,'changePassword'])->name('change.password')->middleware('auth');
  //  Route::get('/', function () { return view('opportunities/index'); })->name('home');
    Route::get('/', [OpportunityController::class,'index'])->name('home');
    Route::get('/registration',[AuthManager::class,'registration'])->name('registration')->middleware('auth');
    Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post')->middleware('auth');

    Route::resource('opportunities', OpportunityController::class);
    Route::get('indexview', [OpportunityController::class, 'indexview'])->name('opportunities.indexview');

   });







// otp varification
Route::get('/verify-email', [OtpController::class, 'showEmailVerificationForm'])->name('verify.email');
Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('send.otp');
Route::get('/verify-otp', [OtpController::class, 'showOtpVerificationForm'])->name('verify.otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('otp.verify');




Route::post('/otp', [OtpController::class, 'showOtpPage'])->name('otp');

// Route::get('/otp', function () {
//     return view('emails.otp');
// })->name('otp');
