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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Questionnaires/create', 'QuestionnaireController@create');
Route::post('/Questionnaires', 'QuestionnaireController@store');
Route::get('/Questionnaires/{questionnaire}', 'QuestionnaireController@show');

Route::get('/Questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/Questionnaires/{questionnaire}/questions', 'QuestionController@store');
Route::delete('/Questionnaires/{questionnaire}/questions', 'QuestionController@destroy');

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');



