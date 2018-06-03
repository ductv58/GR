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
    Route::post('/detail-branch/{id}', ['as' => 'detail-branch', 'uses' => 'HomeController@postRate']);
    Route::post('/report-homepage', ['as' => 'report', 'uses' => 'HomeController@report']);
});
Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('admin/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
        Route::post('admin/post-login', ['as' => 'post-login', 'uses' => 'Auth\LoginController@authenticate']);
        Route::get('admin/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    });
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@index']);
        Route::resource('question', 'ManagesQuestionController');
        Route::resource('branch', 'ManagesBranchController');
        Route::resource('user', 'ManagesUserController');
        Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'ManagesReportController@index']);
            Route::delete('{id}', ['as' => 'delete', 'uses' => 'ManagesReportController@destroy']);
            Route::put('action-report', ['as' => 'action-report', 'uses' => 'ManagesReportController@actionReport']);
        });
    });
});

