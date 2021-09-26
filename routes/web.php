<?php


Auth::routes();


Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('login.admin');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('login.admin');

Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm')->name('login.writer');
Route::post('/login/writer', 'Auth\LoginController@writerLogin')->name('login.writer');

Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm')->name('register.writer');
Route::post('/register/writer', 'Auth\RegisterController@createWriter')->name('register.writer');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('register.admin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('register.admin');


Route::view('/', 'home')->middleware('auth');



Route::group(['middleware' => 'auth:admin'], function () {
    Route::view('/admin', 'admin');
});

Route::group(['middleware' => 'auth:writer'], function () {
    Route::view('/writer', 'writer');
});
