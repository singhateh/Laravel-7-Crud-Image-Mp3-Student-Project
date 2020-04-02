<?php

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

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/image', 'ImageControllers');

// Route::get('/delete/{id}', 'ImageControllers@delete');





Route::resource('mp3', 'Mp3Controller');

Route::get('mp3/{id}','Mp3Controller@download');




























// Route::resource('/students', 'StudentController'); 

// Route::resource('/images', 'ImagesController'); 

// Route::get('/delete/{id}', 'ImagesController@delete'); 


// Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
// Route::match(['get','post'],'/students/edit/{id}','StudentController@editProduct');
// Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
// Route::get('/admin/view-products','ProductsController@viewProducts');