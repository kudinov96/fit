<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FirstQuizController;
use App\Http\Controllers\MarathonController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', fn() => view('home'))->name("home");

Route::post("user/register/endpoint", [UserController::class, "endpoint"]);

// Обычный пользователь
Route::group(["middleware" => ['auth', 'can.showMarathon']], function() {
    Route::get("first-quiz", [FirstQuizController::class, "index"])->name("first_quiz.index");
    Route::post("first-quiz", [FirstQuizController::class, "store"])->name("first_quiz.store");

    Route::post("result", [ResultController::class, "store"])->name("result.store");

    Route::get("marathon", [MarathonController::class, "index"])->name("marathon.index");
    Route::get("marathon/before", [MarathonController::class, "before"])->name("marathon.before");
});

// Переопределяю методы авторизации
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->middleware(['guest'])
    ->name('password.email');

Route::post('reset-password', [AuthController::class, 'resetPassword'])
    ->middleware(['guest'])
    ->name('password.update');

