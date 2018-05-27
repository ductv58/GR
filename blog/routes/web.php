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

Route::get('/botman', 'BotManController@handle');
Route::post('/botman', 'BotManController@handle');

Route::group(['namespace' => 'Homepage', 'as' => 'homepage.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegisterForm']);
        Route::post('register', ['as' => 'create', 'uses' => 'Auth\RegisterController@create']);
        Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
        Route::post('post-login', ['as' => 'post-login', 'uses' => 'Auth\LoginController@authenticate']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    });
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/detail-branch/{id}', ['as' => 'detail-branch', 'uses' => 'HomeController@detailBranch']);
    Route::get('/list-branch', ['as' => 'list-branch', 'uses' => 'HomeController@listBranch']);
    Route::post('/detail-branch', ['as' => 'detail-branch', 'uses' => 'HomeController@test']);
});
Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@index']);
    Route::resource('question', 'ManagesQuestionController');
    Route::resource('branch', 'ManagesBranchController');
});

