<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPanelSettingsController;
use App\Http\Controllers\Admin\TreasuriesController;

use Illuminate\Support\Facades\Route;

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

define('PAGINATION_COUNT', 5);
Route::get('/', function () {
    return view('admin.auth.login');
});
//admin.treasuries.index
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    /*    start  admin-panel-settings     */
    Route::get('/admin-panel-settings/index', [AdminPanelSettingsController::class, 'index'])->name('admin.adminPanelSettings.index');
    Route::get('/admin-panel-settings/edit', [AdminPanelSettingsController::class, 'edit'])->name('admin.adminPanelSettings.edit');
    Route::post('/admin-panel-settings/update', [AdminPanelSettingsController::class, 'update'])->name('admin.adminPanelSettings.update');
    /*    start  treasuries     */
    Route::get('/treasuries/index', [TreasuriesController::class, 'index'])->name('admin.treasuries.index');
    Route::get('/treasuries/create', [TreasuriesController::class, 'create'])->name('admin.treasuries.create');
    Route::post('/treasuries/store', [TreasuriesController::class, 'store'])->name('admin.treasuries.store');
    Route::get('/treasuries/edit/{id}', [TreasuriesController::class, 'edit'])->name('admin.treasuries.edit');
    Route::post('/treasuries/update/{id}', [TreasuriesController::class, 'update'])->name('admin.treasuries.update');


    /*    end treasuries       */
});
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/loginform', [LoginController::class, 'show_login_view'])->name('admin.loginform');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});
