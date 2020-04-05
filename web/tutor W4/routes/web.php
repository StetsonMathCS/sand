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
Route::get('/', 'Front\DashboardController@index');
Route::get('login', 'Front\DashboardController@login');
Route::get('register', 'Front\DashboardController@register');
Route::get('classes', 'Front\DashboardController@classes');
Route::get('profile', 'Front\DashboardController@profileStudent');
