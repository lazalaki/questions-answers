<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AnswersController;

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


Route::get('/', [RegisterController::class, 'showRegisterForm'])->name('home');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login/login-form', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
  Route::post('questions/view/{id}/answer/create', [AnswersController::class, 'store'])->name('answer.create');
  Route::get('/questions/view', [QuestionController::class, 'view'])->name('questions.view');
  Route::get('/questions/form', [QuestionController::class, 'showCreateQuestionForm'])->name('questions.form');
  Route::delete('/questions/delete/{id}', [QuestionController::class, 'delete'])->name('question.delete');
  Route::post('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
  Route::get('/questions/view/{id}', [QuestionController::class, 'singleView'])->name('questions.view.single');
  Route::delete('/questions/{questionId}answer/delete/{id}', [AnswersController::class, 'delete'])->name('answer.delete');
});
