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

Route::prefix('popup')->group(function() {
    
    Route::resource('/', 'PopupController');
    Route::get('/', 'PopupController@index')->name('popup.index');
    Route::get('/', 'PopupController@open')->name('popup.open');

    // Admin Routes
    Route::resource('/admin', 'AdminController');
    Route::get('/admin/ajax/data', 'AdminController@datatables'); // For Datatables
    Route::get('/admin/popup/create', 'AdminController@create')->name('admin.popup.create');
    Route::get('/admin/popup/edit', 'AdminController@edit')->name('admin.popup.edit');
    Route::post('/admin/popup/destroy', 'AdminController@destroy')->name('admin.popup.destroy');
    Route::post('/admin/popup/update', 'AdminController@update')->name('admin.popup.update');
    Route::post('/admin/popup/store', 'AdminController@store')->name('admin.popup.store');

    
});
