<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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
Route::resource('admin', 'AuthAdmin\LoginController');
Route::resource('admin', 'AuthAdmin\RegisterController');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//======================== Users ========================
Route::get('/userProfile', [App\Http\Controllers\User\ProfilerController::class, 'index'])->middleware('auth')->name('profile');


//======================== Admins =======================

//Login Routes For Admins...
Route::get('/admin-log', [App\Http\Controllers\AuthAdmin\LoginController::class, 'showLoginForm']);
Route::post('/admin-log', [App\Http\Controllers\AuthAdmin\LoginController::class, 'login'])->name('loginAdmin');

Route::group(['middleware' => ['web']], function () {

// Registration Routes For Admins...
    Route::get('/admin/register', [App\Http\Controllers\AuthAdmin\RegisterController::class, 'show'])->name('adminRegister');
    Route::post('/admin/register', [App\Http\Controllers\AuthAdmin\RegisterController::class,'register'])->name('registerAdmin');
//    Route::get('allAdmins', [App\Http\Controllers\Admin\AdminController::class, 'getAllAdmins'])->name('allAdmins');
//    Route::get('jsGetAdmins', [App\Http\Controllers\Admin\AdminController::class, 'jsGetAdmin']);
    Route::post('/editAdmin', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('editAdmin');
    Route::post('/deleteAdmin', [App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('deleteAdmin');

//Show Pages For Admin
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

});

//// Registration Routes For Admins...
//Route::get('/admin/register', [App\Http\Controllers\AuthAdmin\RegisterController::class, 'show'])->name('adminRegister');
//Route::post('/admin/register', [App\Http\Controllers\AuthAdmin\RegisterController::class,'register'])->name('registerAdmin');



//Test Connection to DataBase
Route::get('/test', function (){
    if (DB::connection()->getDatabaseName()){ dd('Conect to DB');
    }else{ return 'No conection to DB'; }
});
