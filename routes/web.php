<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
Route::get('/resorts-overview', [App\Http\Controllers\GuestController::class, 'overview'])->name('online_registration.resorts_overview');
Route::get('/resorts-more-info/kYl_J9c43{id}0Wnw0P-LkqL8', [App\Http\Controllers\GuestController::class, 'info'])->name('online_registration.more_info');
Route::get('/resort-alcoy-registration/vbF5CLGrc4DHQSppjwrkdG3b5{id}5', [App\Http\Controllers\GuestController::class, 'redirectTo'])->name('online_registration.guest_registration');
Route::post('/guest_register', [App\Http\Controllers\GuestController::class, 'onlineRegister']);

Route::get('/forbidden', [App\Http\Controllers\HomeController::class, 'forbidden'])->name('error_code.forbidden');

Auth::routes();
    Route::get('/', function () {
        return redirect('/login');
    });
    
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('admin.profile');
Route::get('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'addResort'])->name('admin.add_resort');
Route::post('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'save']);
Route::any('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'show'])->name('admin.add_user');
Route::put('/add_user/changepass/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'changePass'])->name('admin.add_user.change');
Route::get('/add_users', [App\Http\Controllers\Admin\AddUserController::class, 'redirectToAddUser'])->name('admin.add_users');
Route::post('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'saveUser']);
Route::any('/add_user/search', [App\Http\Controllers\Admin\AddUserController::class, 'search']);
Route::get('/add_user/rRZJajI4ajIRZJajI44{id}RZJajI4/edit', [App\Http\Controllers\Admin\AddUserController::class, 'editUser'])->name('admin.add_user_edit');
Route::put('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'updateUser']);
Route::get('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'show'])->name('admin.resort_list');
Route::get('/resorts_status_update/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'changeResortStatus']);
Route::post('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'uploadProfile']);
Route::get('/resort_list/resort_guest/jI{id}35I4afhdIRZJaI', [App\Http\Controllers\Admin\ResortListController::class, 'guest'])->name('resorts.resort_guest');
Route::post('/resort_list/resort_guest/{id}', [App\Http\Controllers\DateController::class, 'updateDate'])->name('resorts.resort_guest.update');
Route::get('/resort_guest/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'guest'])->name('resorts.resort_guest.staff');;
Route::get('/status_update/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'changeUserStatus']);
Route::get('/status_accept/{id}', [App\Http\Controllers\Staff\DirectRegisterController::class, 'accept']);
Route::get('/status_cancel/{id}', [App\Http\Controllers\Staff\DirectRegisterController::class, 'cancel']);
Route::get('/status_leave_delete/{id}', [App\Http\Controllers\Staff\DirectRegisterController::class, 'leave']);
Route::get('/resort_list/resort_list_edit/AHm5kYl_J9cl1p23{id}kYl_J9c', [App\Http\Controllers\Admin\ResortListController::class, 'edit'])->name('admin.resort_list_edit');
Route::put('resort_list/resort_list_edit/updateSubImage/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'updateImage']);
Route::post('/resort_list/resort_list_edit/add-image/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'addImage'])->name('admin.resort_list_edit.add');
Route::get('/resort_list/resort_list_edit/delete-image/{id}', [App\Http\Controllers\Admin\ResortListController::class, 'deleteImage']);
Route::put('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'update']);
Route::get('/generate_qrcode', [App\Http\Controllers\Admin\QrCodeController::class, 'qrCode'])->name('resorts.generate_qrcode');

Route::get('/staff_dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'dashboard'])->name('staff.dashboard');
Route::get('/staff_register', [App\Http\Controllers\Staff\DirectRegisterController::class, 'index'])->name('staff.staff_register');
Route::post('/register', [App\Http\Controllers\Staff\DirectRegisterController::class, 'register']);
Route::get('/profile/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'editUserInformation'])->name('admin.profile.test');
Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'updateUserInformation']);

Route::get('/change_password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'redirectTo'])->name('auth.passwords.changePassword');
Route::post('/change_password', [App\Http\Controllers\Auth\ChangePasswordController::class, 'updatePassword']);;
Route::get('/reset_password', [App\Http\Controllers\Controller::class, 'reset'])->name('auth.passwords.reset');
Route::post('/reset_password', [App\Http\Controllers\Controller::class, 'updatePass']);

Route::get('/not_found', [App\Http\Controllers\HomeController::class, 'notFound'])->name('error_code.not_found');



