<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StuffController;

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

Route::get('/time', function (){
    date_default_timezone_set('Asia/Manila');
    echo "<span style='color:red;font-weight:bold;'>Date: </span>". date('F j, Y g:i:a  ');
});

Route::get('/check/point',[StuffController::class,'check_point'])->name('checkpoint.view');

// Home Route
Route::get('/',[MainController::class,'home']);
Route::get('/login',[MainController::class,'login'])->name('login'); //login view
Route::get('/signup',[MainController::class,'signup'])->name('signup'); //signup view

//account verifiying
Route::get('/verification',[MainController::class,'verify'])->name('verificationUser.view'); //verification view email
Route::get('/verify',[MainController::class,'verify_user']); // email verification checking
Route::post('/otp',[MainController::class,'otp_check'])->name('otpUser.check'); // checking otp code if match

// reset resend
Route::get('/resend/emailverification',[MainController::class,'resend_emailverification']);
Route::get('/reset/send',[MainController::class,'resend'])->name('reset.view'); // go to resend reset view
Route::get('/forgot/password',[MainController::class,'forgot_password'])->name('forgot.pass'); // forgot password view
Route::get('/reset/password',[MainController::class,'reset_check']); // reset email checking
Route::post('/reset/check',[MainController::class,'reset_process'])->name('reset.process'); //proccess of getting data of email to reset
Route::post('/update/password',[MainController::class,'update_password'])->name('update.password'); // updating new password
Route::post('/resend/resetpassword',[MainController::class,'resend_resetpass'])->name('resend.passreset'); //resending reset email

// Route Proccess
Route::post('auth/login',[MainController::class,'login_check'])->name('authUser.login'); //login proccissing
Route::post('auth/register',[MainController::class,'register_store'])->name('authUser.register');  //signup proccess

//logout
Route::get('/logout',[MainController::class,'logout'])->name('logout'); // logout removing data form session
   

// user route
// Only authenticated can access this route
Route::prefix('user')->middleware(['authCheck'])->group(function ()
{
    // side nav view
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard.view');
    Route::get('/booking',[UserController::class,'book'])->name('book.view'); //booking section
    Route::get('/map',[UserController::class,'map'])->name('map.view'); //map section 
   
    Route::post('/booking/next',[UserController::class,'book2'])->name('book2.view');//book2 section
    Route::post('/booking/submit',[UserController::class,'book_data'])->name('book.data');//booking insert data
    
    // Profile  
    Route::get('/profile',[UserController::class,'profile'])->name('profileUser.view');
    Route::post('/update',[UserController::class,'profile_update'])->name('profileUser.process');
    Route::get('/profile/delete',[UserController::class,'delete_profile'])->name('profileDeleteUser.process');
   
});

// admin route
Route::prefix('admin')->middleware(['isAdmin'])->group(function () 
{
    Route::get('/dashboard',[AdminController::class,'dashboard']);
});

// stuff route
Route::prefix('stuff')->middleware(['isStuff'])->group(function () 
{
    Route::get('/dashboard',[StuffController::class,'dashboard'])->name('dashboardStuff.view');
    Route::get('/profile',[StuffController::class,'profile'])->name('profileStuff.view');
    Route::get('/profile/delete',[StuffController::class,'delete_profile'])->name('profileDelete.proccess');

    Route::post('/update',[StuffController::class,'profile_update'])->name('profile.process');
});
