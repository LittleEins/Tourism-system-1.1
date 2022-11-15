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


Route::get('/alert/notification',[StuffController::class,'alert']);

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
Route::get('user/notific',[UserController::class,'get_notif']);
Route::get('/view/data',[UserController::class,'view_data']);
Route::get('/stuff/view/data',[StuffController::class,'view_data']);
Route::get('/graph/data',[StuffController::class,'graph_data']);
Route::get('/data',[StuffController::class,'weekly_data']);
Route::post('/create/notification',[StuffController::class,'send_notification']);
Route::get('/view/notif',[UserController::class,'view_notif']);
Route::get('/user/notif',[UserController::class,'user_notif_log']);
Route::get('/user/view/notification',[UserController::class,'user_notif_view']);
Route::get('/stuff/view/notification',[StuffController::class,'stuff_notif_view']);
Route::get('/notif',[StuffController::class,'notif_log']);
Route::get('/stuff/notific',[StuffController::class,'get_notif']);
Route::get('/stuff/notif',[StuffController::class,'stuff_notif_log']);
Route::get('/stuff/view/notif',[StuffController::class,'view_notif']);
Route::get('delete/notif',[StuffController::class,'delete_notif']);
Route::get('/user/delete/notif',[UserController::class,'user_delete_notif']);
Route::get('/stuff/delete/notif',[StuffController::class,'stuff_delete_notif']);
Route::get('/locations/map',[UserController::class,'map_locations']);
Route::get('/maplocation',[AdminController::class,'map_location_fetch']);
Route::post('/addlocation',[AdminController::class,'add_location']);
Route::post('/admin/create/notification',[AdminController::class,'send_notification']);
Route::get('/admin/notif',[AdminController::class,'notif_log']);
Route::get('/admin/delete/notif',[AdminController::class,'delete_notif']);


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
   
    // Booking
    Route::post('/booking/next',[UserController::class,'book2'])->name('book2.view');//book2 section
    Route::post('/booking/submit',[UserController::class,'book_data'])->name('book.data');//booking insert data
    
    // Profile  
    Route::get('/profile',[UserController::class,'profile'])->name('profileUser.view');
    Route::post('/update',[UserController::class,'profile_update'])->name('profileUser.process');
    Route::get('/profile/delete',[UserController::class,'delete_profile'])->name('profileDeleteUser.process');

    Route::get('/book/view/all',[UserController::class,'log_view']);
    Route::get('/book/delete',[UserController::class,'log_delete']);
    Route::get('/book/leave',[UserController::class,'leave_location']);
    Route::get('/book/confirm',[UserController::class,'log_confirm']);
    Route::get('/view/all',[UserController::class,'notifications']);
    Route::get('/log/view/all',[UserController::class,'records_group_view']);
    Route::get('/booking/log',[UserController::class,'book_log'])->name('book_log');
    Route::get('/records',[UserController::class,'records'])->name('history');
});

// admin route
Route::prefix('admin')->middleware(['isAdmin'])->group(function () 
{
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/map/locations',[AdminController::class,'add_map_location'])->name('admin.addmap');
    Route::get('/alert/notification',[AdminController::class,'alert']);
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

    Route::get('/stuff/book/view/all',[StuffController::class,'br_view']);
    Route::get('/book/delete',[StuffController::class,'br_delete']);
    Route::get('/book/confirm',[StuffController::class,'br_confirm']);
    Route::get('/log',[StuffController::class,'logs']);
    Route::get('/log/view/all',[StuffController::class,'records_group_view']);
    Route::get('/alert/notifications',[StuffController::class,'alert']);
    Route::get('/view/all',[StuffController::class,'notifications']);
});
