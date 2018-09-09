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

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

Route::group(['middleware'=>['auth', 'user_can_manipulate_owned_resources']], function(){
    Route::get('/create', 'HomeController@create')->name('create');
    Route::post('/store', 'HomeController@store')->name('store');

    //show church
    Route::get('/show_church/{church}', 'HomeController@show_church')->name('show_church');

    Route::get('/members/{church}', 'HomeController@form_members')->name('form_members');
    Route::post('/store_members/{church}', 'HomeController@store_members')->name('store_members');
    Route::get('/show_members/{church}/{secondParam?}', 'HomeController@show_members')->name('show_members');
    Route::get('/show_members_active/{church}', 'HomeController@show_active_members')->name('show_active_members');
    Route::get('/show_members_by_create/{church}', 'HomeController@show_members_by_create')->name('show_members_by_create');

    

    Route::get('/members/{member}/detail','HomeController@memberDetail')->name('home.detail');
    Route::get('/active/{member}','HomeController@memberActive')->name('member.active');

    Route::resource('members','MemberController', ['except'=>['index','show','create','store']]);
    Route::resource('church','ChurchController', ['except'=>['show','create','store']]);

});
Route::get('logout', 'AuthController@LogOut')->name('logout');

Route::get('contact', 'ContactController@showForm')->name('contact');

Route::post('contact', 'ContactController@send_contact_email_attempt')->name('send_contact_email_attempt');



Route::group(['middleware'=>'guest'], function(){
    Route::get('register', 'AuthController@RegisterForm')->name('register_form');
    Route::post('register', 'AuthController@RegisterAttempt')->name('register');

    Route::get('login', 'AuthController@LoginForm')->name('login_form');
    Route::post('login', 'AuthController@LoginAttempt')->name('login');
    
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');


});






