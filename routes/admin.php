<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::name('admin.')->group( function() {

	// Login
	Route::get('login', 'Back\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Back\LoginController@login')->name('login');

	Route::group(['middleware' => 'auth:admin'], function() {

		Route::post('logout', 'Back\LoginController@logout')->name('logout');

		// Dashboard
		Route::get('dashboard', function () {
		    return view('back.dashboard');
		})->name('dashboard');

		Route::resources([
			'admins' => 'Back\AdminController',
			'users' => 'Back\UserController',
			'customers' => 'Back\CustomerController',
			'products' => 'Back\ProductController',
	 	],[
	 		'except' => 'show',
        ]);

        // Route::post('projects/metas/store/{id}', 'Back\ProjectController@storeMetaGallery')->name('projects.metas.store.gallery');
        // Route::delete('projects/metas/delete/{id}', 'Back\ProjectController@deleteMetaGallery')->name('projects.metas.delete.gallery');

        Route::get('products/stock/{id}', 'Back\ProductController@indexStock')->name('products.stock.index');
        Route::post('products/stock/store', 'Back\ProductController@storeStock')->name('products.stock.store');

        Route::prefix('datatable')->name('datatable.')->group(function() {
	 		Route::get('admins', 'Back\AdminController@datatable')->name('admins');
	 		Route::get('users', 'Back\UserController@datatable')->name('users');
	 		Route::get('customers', 'Back\CustomerController@datatable')->name('customers');
	 		Route::get('products', 'Back\ProductController@datatable')->name('products');
	 		Route::get('products/stock/{id}', 'Back\ProductController@datatableStock')->name('products.stock');
	 	});

	 	Route::prefix('select2')->name('select2.')->group(function() {
	 		// Route::get('projects', 'Back\ProjectController@select2')->name('projects');
	 	});
	});
});