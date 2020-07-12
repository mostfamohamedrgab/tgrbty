<?php

//** Must Be Not Login As A Admin *****//
Route::group(['middleware' => 'guest:admin'], function (){
  Route::get('Dashboard/Login','AuthController@showlogin');
  Route::post('Dashboard/Login','AuthController@login')->name('admin.login');
});

// Admin Protected Area
Route::group(['prefix' => 'Dashboard','as' => 'admin.','middleware' => 'auth:admin'], function (){
      // mainDashboardPage
      Route::get('/','DashboardController@index');
      // Admins Routes
      Route::resource('Admin','AdminsController');
      // Users
      Route::resource("User",'UsersController');
      // Sections
      Route::resource("Section",'SectionsController');
      // experiences
      Route::resource('Experience','ExperienceController');
      Route::get('Experience/status/{id}','ExperienceController@changestuts')->name('Experience.chnagestutes');
      // Lougout
      Route::post('Logout','AuthController@logout')->name('logout');
});
