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
/*** Authntcation Routes ***/
Auth::routes();
/*** Pages Routes ***/
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
  // ForntControlelrs
Route::group(['namespace' => 'Front'], function (){
  Route::get('/experience', 'PagesController@blog')->name('blog');
  Route::get('/{slug}','PagesController@showpost')->name('showpost');
});
