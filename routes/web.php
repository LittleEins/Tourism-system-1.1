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

Route::get('/stuff/book/view/all',[StuffController::class,'br_view']);
Route::get('/stuff/book/delete',[StuffController::class,'br_delete']);
Route::get('/stuff/book/confirm',[StuffController::class,'br_confirm']);
Route::get('/alert/notification',[StuffController::class,'alert']);

Route::get('/user/book/view/all',[UserController::class,'log_view']);
Route::get('/user/book/delete',[UserController::class,'log_delete']);
Route::get('/user/book/confirm',[UserController::class,'log_confirm']);

Route::get('/user/log/view/all',[UserController::class,'records_group_view']);

Route::get('/edit/location',[AdminController::class,'edit_location']);
Route::get('/delete/location',[AdminController::class,'delete_location']);

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

// ajax
Route::get('/fetch-checkpoint',[StuffController::class,'fetch_checkpoint']);
Route::get('/visited',[UserController::class,'fetch_visit']);
Route::get('/user/dashboard/fetch',[UserController::class,'dashboard_fetch']);
Route::get('/book2/count',[UserController::class,'book2_count']);
Route::get('/graph/data',[StuffController::class,'graph_data']);
Route::get('/data',[StuffController::class,'weekly_data']);
Route::post('/create/notification',[StuffController::class,'send_notification']);
Route::get('/notif',[StuffController::class,'notif_log']);
Route::get('/locations/map',[UserController::class,'map_locations']);
Route::get('/maplocation',[AdminController::class,'map_location_fetch']);
Route::post('/addlocation',[AdminController::class,'add_location']);



// Route Proccess
Route::post('auth/login',[MainController::class,'login_check'])->name('authUser.login'); //login proccissing
Route::post('auth/register',[MainController::class,'register_store'])->name('authUser.register');  //signup proccess

//logout
Route::get('/logout',[MainController::class,'logout'])->name('logout'); // logout removing data form session
   
Route::get('/booking/log',[UserController::class,'book_log'])->name('book_log');
Route::get('/records',[UserController::class,'records'])->name('history');
// user route
// Only authenticated can access this route
Route::prefix('user')->middleware(['authCheck'])->group(function ()
{
    // side nav view
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard.view');
    Route::get('/booking',[UserController::class,'book'])->name('book.view'); //booking section
    Route::get('/map',[UserController::class,'map'])->name('map.view'); //map section 
   
    // Booking
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
    Route::get('/map/locations',[AdminController::class,'add_map_location'])->name('admin.addmap');
});

// stuff route
Route::prefix('stuff')->middleware(['isStuff'])->group(function () 
{
    Route::get('/dashboard',[StuffController::class,'dashboard'])->name('dashboardStuff.view');
    Route::get('/profile',[StuffController::class,'profile'])->name('profileStuff.view');
    Route::get('/profile/delete',[StuffController::class,'delete_profile'])->name('profileDelete.proccess');

    Route::post('/update',[StuffController::class,'profile_update'])->name('profile.process');
    Route::get('/check/point',[StuffController::class,'check_point'])->name('checkpoint.view');
    Route::get('/repors',[StuffController::class,'reports'])->name('report.view');
});
