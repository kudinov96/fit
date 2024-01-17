<?php

use App\Http\Controllers\FirstQuizController;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::post("user/register/endpoint", [UserController::class, "endpoint"]);

Route::group(["middleware" => ['auth'], "prefix" => "dashboard"], function() {
    Route::post("first-quiz", [FirstQuizController::class, "store"])->name("first_quiz.store");
    Route::post("result", [ResultController::class, "store"])->name("result.store");
});

