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
        Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
        Route::post('post-login', ['as' => 'post-login', 'uses' => 'Auth\LoginController@authenticate']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    });
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/show-question-rs', ['as' => 'show_question_rs', 'uses' => 'HomeController@showQuestionRS']);
    Route::get('/recommender', ['as' => 'recommender', 'uses' => 'HomeController@recommender']);
});
Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@index']);
    Route::resource('question', 'ManagesQuestionController');
});

