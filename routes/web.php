<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\Admin;


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


Auth::routes();

//checking for user type = admin
Route::get('/side_navbar', [App\Http\Controllers\Admin\SideNavbarController::class, 'sideNavbar'])->middleware('type:ADMIN');
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('admin.profile');
Route::get('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'addResort'])->name('admin.add_resort');
Route::post('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'save']);
Route::get('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'show'])->name('admin.add_user');
Route::post('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'addUser']);
Route::get('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'show'])->name('admin.resort_list');
Route::get('/resort_list/voda_krasna', [App\Http\Controllers\Admin\ResortListController::class, 'resortList'])->name('admin.resorts.voda_krasna');

Route::get('/add_user/{id}/edit', [App\Http\Controllers\Admin\AddUserController::class, 'editUser'])->name('admin.add_user_edit');
Route::put('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'updateUser']);

Route::get('/status_update/{id}', [App\Http\Controllers\Admin\AddUserController::class, 'changeUserStatus']);

Route::get('/resort_list/{id}/edit', [App\Http\Controllers\Admin\ResortListController::class, 'edit'])->name('admin.edit_resort_list');
Route::put('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'update']);

Route::get('/forbidden', [App\Http\Controllers\HomeController::class, 'forbidden'])->name('admin.forbidden');


////checking for user type = staff
Route::get('/staff_dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->middleware('type:STAFF');




