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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();



// Rout Admin


// Route::group(['middleware' => ['auth','Owner']], function () {
Route::group(['middleware' => 'auth'], function () {
	Route::get('admin', function() {
		return redirect('admin/dashboard');
	});
   






	Route::prefix('admin')->group(function (){
		Route::get('/dashboard', 'Admin\HomeController@index')->name('dashboard');
		Route::resource('admins', 'Admin\AdminController', ['except' => ['show']]);	
		Route::resource('user', 'Admin\UserController', ['except' => ['show']]);
		Route::resource('tracks', 'Admin\TrackController');	
		Route::resource('/tracks.courses', 'Admin\TrackCourseController');	

		
		Route::resource('courses', 'Admin\CourseController');
		Route::resource('/courses.videos', 'Admin\CourseVideo');
		Route::resource('/courses.quizzes', 'Admin\CourseQuizeController');	
	


		Route::resource('videos', 'Admin\VideoController');	


		Route::resource('quizzes', 'Admin\QuizController');	
		Route::resource('quizzes.questions', 'Admin\QuizQuestionController');	

		Route::resource('questions', 'Admin\QuestionController',['except' =>['show']]);	

		
	

	

		Route::get('profile', ['as' => 'profile.edit', 'uses' => 'Admin\ProfileController@edit']);
		Route::put('profile', ['as' => 'profile.update', 'uses' => 'Admin\ProfileController@update']);
		Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'Admin\ProfileController@password']);



	});

	
	
});
