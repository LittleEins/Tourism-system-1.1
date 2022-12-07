<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\SuperAdminController;

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


Route::get('/alert/notification',[staffController::class,'alert']);

Route::get('/edit/location',[AdminController::class,'edit_location']);

Route::get('/edit/pass/account',[AdminController::class,'edit_staff_account']); 


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
Route::get('/fetch-checkpoint',[staffController::class,'fetch_checkpoint']);
Route::get('/leave/manual',[staffController::class,'leave_manual']);
Route::get('/visited',[UserController::class,'fetch_visit']);
Route::get('/user/dashboard/fetch',[UserController::class,'dashboard_fetch']);
Route::get('/book2/count',[UserController::class,'book2_count']);
Route::get('user/notific',[UserController::class,'get_notif']);
Route::get('/view/data',[UserController::class,'view_data']);
Route::get('/staff/view/data',[staffController::class,'view_data']);
Route::get('/graph/data',[staffController::class,'graph_data']);
Route::get('/data',[staffController::class,'weekly_data']);
Route::post('/create/notification',[staffController::class,'send_notification']);
Route::get('/view/notif',[UserController::class,'view_notif']);
Route::get('/user/notif',[UserController::class,'user_notif_log']);
Route::get('/user/view/notification',[UserController::class,'user_notif_view']);
Route::get('/staff/view/notification',[staffController::class,'staff_notif_view']);
Route::get('/notif',[staffController::class,'notif_log']);
Route::get('/staff/notific',[staffController::class,'get_notif']);
Route::get('/staff/notif',[staffController::class,'staff_notif_log']);
Route::get('/admin/notif',[AdminController::class,'admin_notif_log']);
Route::get('/staff/view/notif',[staffController::class,'view_notif']);
Route::get('delete/notif',[staffController::class,'delete_notif']);
Route::get('/user/delete/notif',[UserController::class,'user_delete_notif']);
Route::get('/staff/delete/notif',[staffController::class,'staff_delete_notif']);
Route::get('/admin/delete/notif',[AdminController::class,'admin_delete_notif']);
Route::get('/locations/map',[UserController::class,'map_locations']);
Route::get('/maplocation',[AdminController::class,'map_location_fetch']);
Route::post('/addlocation',[AdminController::class,'add_location']);
Route::post('/admin/create/notification',[AdminController::class,'send_notification']);
Route::get('/admin/notif',[AdminController::class,'notif_log']);
Route::get('/admin/delete/notif',[AdminController::class,'delete_notif']);
Route::get('/admin/fetch/account',[AdminController::class,'fetch_account']);
Route::post('/create/staff/account',[AdminController::class,'create_staff_account']);
Route::get('/delete/account',[AdminController::class,'delete_staff_account']); 
Route::get('/admin/notif/list',[AdminController::class,'get_notif_list']); 
Route::get('/list/location/link',[AdminController::class,'fetch_location_link']);
Route::post('/supAdmin/addlocation',[SuperAdminController::class,'add_location']);
Route::get('/supAdmin/fetch/account',[SuperAdminController::class,'fetch_account']);
Route::get('/supAdmin/location/link',[SuperAdminController::class,'fetch_location_link']);
Route::post('/supAdmin/create/staff/account',[SuperAdminController::class,'create_staff_account']);

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

// staff route
Route::prefix('staff')->middleware(['isstaff'])->group(function () 
{
    Route::get('/dashboard',[staffController::class,'dashboard'])->name('dashboardstaff.view');
    Route::get('/profile',[staffController::class,'profile'])->name('profilestaff.view');
    Route::get('/profile/delete',[staffController::class,'delete_profile'])->name('profileDelete.proccess');

    Route::post('/update',[staffController::class,'profile_update'])->name('profile.process');
    Route::get('/check/point',[staffController::class,'check_point'])->name('checkpoint.view');
    Route::get('/repors',[staffController::class,'reports'])->name('report.view');

    Route::get('/book/view/all',[staffController::class,'br_view']);
    Route::get('/book/delete',[staffController::class,'br_delete']);
    Route::get('/book/confirm',[staffController::class,'br_confirm']);
    Route::get('/log',[staffController::class,'logs']);
    Route::get('/log/view/all',[staffController::class,'records_group_view']);
    Route::get('/alert/notifications',[staffController::class,'alert']);
    Route::get('/view/all',[staffController::class,'notifications']);
    Route::get('/add/entery',[staffController::class,'book2'])->name('staff.book2');//book2 section
    Route::post('/booking/submit',[staffController::class,'book_data'])->name('staff.book.data');//booking insert data
});

// admin route
Route::prefix('admin')->middleware(['isAdmin'])->group(function () 
{
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/map/locations',[AdminController::class,'add_map_location'])->name('admin.addmap');
    Route::get('/report/generate',[AdminController::class,'report_gen'])->name('admin.report');
    Route::get('/alert/notification',[AdminController::class,'alert']);
    Route::get('/account/manage',[AdminController::class,'acc_manage'])->name('admin.manageacc');

    Route::get('/account/delete',[AdminController::class,'manage_del_acc']); 
    Route::get('/admin/create/stufs',[AdminController::class,'create_staff'])->name('admin.createacc');
    Route::get('/log/view/all',[AdminController::class,'records_group_view']);
    Route::post('/search/report',[AdminController::class,'search_report']);
    Route::get('/delete/location',[AdminController::class,'delete_location']); 
    Route::post('/update/password/staff',[AdminController::class,'staff_update_pass'])->name('update_staff_pass');
    Route::get('/edit/pass/account',[AdminController::class,'edit_users_account']); 
    Route::post('/update/password/staff',[AdminController::class,'staff_update_pass'])->name('update_accounts_pass');
    // export
    Route::get('/reports/export', [AdminController::class, 'export']);
});

// admin route
Route::prefix('supAdmin')->middleware(['isSupadmin'])->group(function () 
{
    Route::get('/dashboard',[SuperAdminController::class,'dashboard'])->name('supAdmin.dashboard');
    Route::get('/map/locations',[SuperAdminController::class,'add_map_location'])->name('supAdmin.addmap');
    Route::get('/create/stufs',[SuperAdminController::class,'create_staff'])->name('supAdmin.createacc');
    Route::get('/account/manage',[SuperAdminController::class,'acc_manage'])->name('supAdmin.manageacc');
    Route::get('/delete/location',[SuperAdminController::class,'delete_location']); 
    Route::get('/edit/pass/account',[SuperAdminController::class,'edit_staff_account']); 
    Route::post('/update/password/staff',[AdminController::class,'staff_update_pass'])->name('sup_update_staff_pass');
    Route::get('/account/delete',[SuperAdminController::class,'manage_del_acc']); 
    Route::get('/delete/account',[AdminController::class,'delete_staff_account']); 
});