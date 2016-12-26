<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

/*
 * Extract the scaffolded routes from Auth::routes() and use only the useful ones.
 * Login/Logout are useful routes.
 * Registration routes are not. New admins should be created via the command line.
 * Password reset routes are sort of useful, but I'd rather write an artisan command to do it.
 */
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

use Illuminate\Http\Request;
Route::any('/test', function (Request $request) {
    return $request;
});
