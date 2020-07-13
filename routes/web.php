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
  // All Experience
  Route::get('/experience', 'PagesController@blog')->name('experiences');
    // One Experience
    Route::get('/Exp/{id}-{slug}','PagesController@showpost')->name('showpost');
  // User/show
  Route::get('/user/{user}','PagesController@showuser')->name('showuser');
  // Contact Page
  Route::get('Contact','PagesController@contact')->name('contact');
  Route::post('Contact','ContactUsController@send')->name('contact');
  /*** Protected By Login Guard ****/
  Route::group(['middleware' => 'auth'], function (){
    // react With Exp
    Route::get('React/{exp}/{action}','ReactController@react')->name('react');
    Route::get('Profile','ProfileController@profile')->name('profile');
    Route::post('EditProfile','ProfileController@editprofile')->name('editProfile');
    Route::post('AddExperience','ProfileController@addexp')->name('addExp');
  });
});

//*** Socilaite Links ***/
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('socilaite');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
