<?php

use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamQuestionController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\StudentExamController;
use App\Http\Controllers\StudentPanelController;
use Illuminate\Support\Facades\Auth;

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
//     // return view('welcome');

// });

Route::get('/storage/link', function () {
    \Artisan::call('storage:link');

});

Route::get('/', [WelcomeController::class, 'welcome'])
->name('welcome.welcome');

  
Auth::routes();
  


Route::get('/home', [HomeController::class, 'index'])->name('home');


  
Route::group(['middleware' => ['role:Admin'],'prefix' => 'admin'], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('exam', ExamController::class);
    Route::resource('examquestion', ExamQuestionController::class);
    Route::get('student/exam/result/show', [StudentPanelController::class, 'adminallstudentresultshow'])
    ->name('adminallstudentresultshow');
   

});



Route::group(['middleware' => ['auth']], function () {
    
    Route::get('exam/student/{id}', [StudentExamController::class, 'examwisequestion'])
    ->name('examwisequestion');
    Route::get('exam/student/next/question', [StudentExamController::class, 'examnextquestion'])
    ->name('examnextquestion');
  
    Route::post('exam/student/finish/question', [StudentExamController::class, 'examfinishquestionpost'])
    ->name('examfinishquestionpost');
    Route::get('exam/student/finish/question/{id}', [StudentExamController::class, 'examfinishquestion'])
    ->name('examfinishquestion');
    Route::get('examstudent/attend/exam', [StudentExamController::class, 'examstudentattend'])
    ->name('examstudentattend');

    Route::get('student/exam/result/show', [StudentPanelController::class, 'onlyauthstudentresultshow'])
    ->name('onlyauthstudentresultshow');
});








   






