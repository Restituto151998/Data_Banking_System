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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/side_navbar', [App\Http\Controllers\Admin\SideNavbarController::class, 'sideNavbar'])->middleware('type:ADMIN');
Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('admin.profile');


Route::get('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'addResort'])->name('admin.add_resort');
Route::post('/add_resort', [App\Http\Controllers\Admin\AddResortController::class, 'save']);


Route::get('/add_user', [App\Http\Controllers\Admin\AddUserController::class, 'addUser'])->name('admin.add_user');
Route::get('/resort_list', [App\Http\Controllers\Admin\ResortListController::class, 'resortList'])->name('admin.resort_list');


Route::get('/staff_dashboard', [App\Http\Controllers\Staff\DashboardController::class, 'index'])->middleware('type:STAFF');



