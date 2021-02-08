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
    return view('auth.login');
});

Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'BackendController@dashboard')->name('backend.dashboard')->middleware('verified');
Route::get('/predict', 'PredictionController@predict')->name('backend.predict')->middleware('verified');
Route::post('/process_predict', 'PredictionController@process_predict')->name('backend.process.predict')->middleware('verified');;
Route::get('/get_users_predictions_json','PredictionController@get_users_predictions_json')->name('backend.get_user_predictions_json');

