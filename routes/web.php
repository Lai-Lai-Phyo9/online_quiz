<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// login page
// Route::get('/', 'FrontendController@index');

Route::get('/','FrontendController@home')->name('home');

Route::get('show','FrontendController@show')->name('show');

Route::get('detail/{id}','FrontendController@detail')->name('detail');

//middleware
// Route::group(['middleware' => ['auth','role:admin|quiz maker']], function () {
	Route::get('dashboard','BackendController@dashboard')->name('dashboard');

	Route::resource('users', 'UserController');

	Route::resource('subjects', 'SubjectController');

	Route::resource('levels', 'LevelController');

	Route::resource('topics', 'TopicController');

	Route::resource('questions', 'QuestionController');

	Route::resource('multiquestions', 'MultiQuestionController');

	Route::resource('truefalsequestions', 'TrueFalseQuestionController');

	Route::resource('shortquestions', 'ShortQuestionController');
	
// });

Route::post('storeanswer', 'FrontendController@storeanswer')->name('storeanswer');

Auth::Routes();

