<?php

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

Route::get('/','pagecontroller@index')->name('index');

Route::get('/category/{id}','pagecontroller@viewCatogray')->name('category');
Route::get('/book/{id}','pagecontroller@viewBook')->name('book');
Route::post('comment/{id}',['uses'=>'pagecontroller@addcomment','middleware'=>'auth'])->name('comment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/upload',['uses'=>'UploadController@index','middleware'=>'roles','roles'=>['admins','users']] )->name('upload');
Route::post('/upload',['uses'=>'UploadController@upload','middleware'=>'roles','roles'=>['admins','users']])->name('upload.save');

Route::group(['prefix'=>'admin','middleware'=>'roles','roles'=>'admins'],function(){
    Route::resource('users','AdminUserController');
    Route::resource('categories','AdminCatograyController');

}); 

