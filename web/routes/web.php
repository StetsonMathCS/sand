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

// Route::get("/", "StudentController@index");

use App\Http\Controllers\RequestController;

Route::get('/', function () {
    return view('login');
});

Route::get('/signup-student', function () {
    return view('signup_students');
});

Route::get('/signup-tutor', function () {
    return view('signup_tutor')
    ->with("courses", (new RequestController())->getAllCourses());
});

Route::get('/logout', function () {
    session()->remove("role");
    return view('logout');
});

Route::get("students", "StudentController@index");
Route::get("tutors", "TutorController@index");
Route::get("subjects", "SubjectController@index");
Route::get("requests", "RequestController@index");
Route::get("profile", "ProfileController@index");

Route::post('dashboard', 'DashboardController@index');
Route::post("students", "StudentController@store");
Route::post("create-student", "StudentController@create");
Route::post("tutors", "TutorController@store");
Route::post("create-tutor", "TutorController@create");
Route::post("tutor_course", "SubjectController@storeTutorCourse");
Route::post("student_course", "SubjectController@storeStudentCourse");
Route::post("requests", "RequestController@store");
