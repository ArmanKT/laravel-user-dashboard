<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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

Route::get('/', function () {
    echo 'Admin!';
})->middleware('checkAdminAuth');

Route::get('/c', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'cleared!';
});

/**
 * Login Routes
 */
Route::get('/login', [Admin\LoginController::class, 'index'])->name('admin.login');
Route::post('/login', [Admin\LoginController::class, 'login'])->name('admin.login.action');

Route::group([
    'prefix' => '/',
    'middleware' => ['auth:admin']
], function () {

    
    Route::get('/dashbaord', [Admin\AdminController::class, 'index'])->name('admin.dashboard');
    
    // User Manage Roles
    Route::resource('/users', Admin\UserListController::class)->names('admin.users');
    Route::resource('/roles', Admin\RolesController::class)->names('admin.roles');
    // 


    // LOG-OUT
    Route::get('/logout', [Admin\AdminController::class, 'logout'])->name('admin.logout');
   
    
});