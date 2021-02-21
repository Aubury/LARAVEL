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
Route::resource('/images','ImageController');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//======================== Users ========================
Route::get('/userProfile', [App\Http\Controllers\User\ProfilerController::class, 'index'])->middleware('auth')->name('profile');


//======================== Admins =======================

//Login Routes For Admins...
Route::get('/admin-log', [App\Http\Controllers\AuthAdmin\LoginController::class, 'showLoginForm']);
Route::post('/admin-log', [App\Http\Controllers\AuthAdmin\LoginController::class, 'login'])->name('loginAdmin');

//Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['web']], function () {

// Registration Routes For Admins...
        Route::post('/admin/register', [App\Http\Controllers\AuthAdmin\RegisterController::class, 'register'])->name('registerAdmin');
        Route::post('/admin/edit', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('editAdmin');
        Route::post('/admin/delete', [App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('deleteAdmin');

        Route::post('/category/register', [App\Http\Controllers\Admin\Categories::class, 'register'])->name('registerCategory');
        Route::post('/category/edit', [App\Http\Controllers\Admin\Categories::class, 'edit'])->name('editCategory');
        Route::post('/category/delete', [App\Http\Controllers\Admin\Categories::class, 'delete'])->name('deleteCategory');

        Route::post('/brands/register', [App\Http\Controllers\Admin\Brands::class, 'register'])->name('registerBrand');
        Route::post('/brands/edit', [App\Http\Controllers\Admin\Brands::class, 'edit'])->name('editBrand');
        Route::post('/brands/delete', [App\Http\Controllers\Admin\Brands::class, 'delete'])->name('deleteBrand');

        Route::post('/images/delete' , [App\Http\Controllers\ImageController::class, 'delete'])->name('deleteImage');
        Route::post('/images/updateImage' , [App\Http\Controllers\ImageController::class, 'updateImage'])->name('updateImage');

        Route::post('/products/add_product',[App\Http\Controllers\Admin\Products::class, 'addProduct'])->name('add_product');
        Route::post('/products/edit_product',[App\Http\Controllers\Admin\Products::class, 'edit_product'])->name('edit_product');
        Route::post('/products/store_img',[App\Http\Controllers\Admin\Products::class, 'store_img'])->name('store_img');
        Route::put('/products/store_img_with_js',[App\Http\Controllers\Admin\Products::class, 'store_img_with_js'])->name('store_img_with_js');
        Route::post('/products/change_main_img', [App\Http\Controllers\Admin\Products::class, 'change_main_img'])->name('change_main_img');


//Show Pages For Admin
        Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
        Route::get('/admin/register', [App\Http\Controllers\AuthAdmin\RegisterController::class, 'show'])->name('adminRegister');
        Route::get('/categories', [App\Http\Controllers\Admin\Categories::class, 'show'])->name('categories');
        Route::get('/brands', [App\Http\Controllers\Admin\Brands::class, 'show'])->name('brands');
        Route::get('/products', [App\Http\Controllers\Admin\Products::class, 'show'])->name('products');
        Route::get('/products/create', [App\Http\Controllers\Admin\Products::class, 'create'])->name('createProduct');
        Route::get('/products/edit/{name}', [App\Http\Controllers\Admin\Products::class, 'edit'])->name('edit_page_product');
        Route::get('/images', [App\Http\Controllers\ImageController::class, 'index'])->name('images');
        Route::get('/images/image/{title}', [App\Http\Controllers\ImageController::class, 'show'])->name('image');



    });
//});



//Test Connection to DataBase
Route::get('/test', function (){
    if (DB::connection()->getDatabaseName()){ dd('Conect to DB');
    }else{ return 'No conection to DB'; }
});
Route::get('/info', function (){
    return view('images.info');
});
