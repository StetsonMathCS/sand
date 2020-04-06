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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', 'PagesController@home')->name('page.home');
Route::get('/about', 'PagesController@about')->name('page.about');
Route::any('/contact', 'PagesController@contact')->name('page.contact');
Route::any('/logs', 'PagesController@logs')->name('page.logs');


Route::middleware('auth')->group(function(){

    Route::get('student/profile', 'StudentController@profile')->name('student.profile');

});
