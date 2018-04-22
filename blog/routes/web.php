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
    Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
    Route::get('/show-question-rs', ['as' => 'show_question_rs', 'uses' => 'HomeController@showQuestionRS']);
    Route::get('/recommender', ['as' => 'recommender', 'uses' => 'HomeController@recommender']);
});
