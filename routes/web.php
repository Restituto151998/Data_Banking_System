<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;


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

//online registration
Route::get('/resort-alcoy-registration', [App\Http\Controllers\GuestController::class, 'redirectTo'])->name('online_registration.guest_registration');
Route::post('/guest_register', [App\Http\Controllers\GuestController::class, 'onlineRegister']);

Auth::routes();

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/side_navbar', [App\Http\Controllers\Admin\SideNavbarController::class, 'sideNavbar'])->middleware('type:ADMIN');

//checking for user type = admin
Route::get('/side_navbar', [App\Http\Controllers\Admin\SideNavbarController::class, 'sideNavbar'])->middleware('type:ADMIN');
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('admin.profile');
Route::get('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'addResort'])->name('admin.add_resort');
Route::post('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'save']);

Route::any('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'show'])->name('admin.add_user');
Route::get('/add_users', [App\Http\Controllers\Admin\AddUserController::class, 'redirectToAddUser'])->name('admin.add_users');
Route::post('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'saveUser']);
Route::any('/add_user/search', [App\Http\Controllers\Admin\AddUserController::class, 'search']);

Route::get('/add_user/{id}/edit', [App\Http\Controllers\Admin\AddUserController::class, 'editUser'])->name('admin.add_user_edit');
Route::put('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'updateUser']);

Route::get('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'show'])->name('admin.resort_list');
//changeStatusResort
 Route::get('/resorts_status_update/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'changeResortStatus']);

 //uploadProfile
 Route::post('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'uploadProfile']);

//GuestList
Route::get('/resort_list/resort_guest/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'guest'])->name('resorts.resort_guest');
Route::get('/resort_guest/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'guest']);
//Print
// Route::get('/resort_list/resort_guest/print_preview/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'printPreview']);
//changeStatus
Route::get('/status_update/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'changeUserStatus']);

Route::get('/resort_list/{id}/edit', [App\Http\Controllers\Admin\ResortListController::class, 'edit'])->name('admin.edit_resort_list');
Route::put('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'update']);

Route::get('/forbidden', [App\Http\Controllers\HomeController::class, 'forbidden'])->name('error_code.forbidden');

Route::get('/generate_qrcode', [App\Http\Controllers\Admin\QrCodeController::class, 'qrCode'])->name('resorts.generate_qrcode');

////checking for user type = staff
Route::get('/staff_dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->middleware('type:STAFF');
Route::get('/staff_register', [App\Http\Controllers\Staff\DirectRegisterController::class, 'index'])->name('staff.staff_register');
Route::post('/register', [App\Http\Controllers\Staff\DirectRegisterController::class, 'register']);


