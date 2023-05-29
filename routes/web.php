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

Route::namespace('App\Http\Controllers')->group(function () {
    Route::resource('slider', 'SliderController');
    Route::resource('service', 'ServiceController');
    Route::resource('facilities', 'facilitiesController');
    Route::resource('program', 'ProgramController');
    Route::get('/logout', 'HomeController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/index', 'HomeController@fronted')->name('frontend');
    Route::get('/cv-list', 'HomeController@cv_list')->name('cv-list');
    Route::get('/video/{id}', 'HomeController@video_play')->name('video');
    Route::get('/portfolio', 'HomeController@drop_portfolio')->name('portfolio');
    Route::post('/portfolio', 'HomeController@upload')->name('upload-cv');
    Route::get('/tutorial', 'HomeController@tutorial')->name('tutorial-program');
});


