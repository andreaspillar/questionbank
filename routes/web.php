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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('question', 'QuestionBankController');
Route::post('answer/{id}', 'AnswerBankController@store');
Route::resource('sets', 'QuestionSetController');
Route::get('geturl/{id}', 'QuestionSetController@geturl')->name('sets.geturl');
Route::post('score/', 'QuestionSetController@score')->name('sets.score');
