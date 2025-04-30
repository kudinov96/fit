<?php

use App\Http\Controllers\Admin\MealPlanController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\StreamController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\FirstQuizController;
use App\Http\Controllers\MarathonController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use App\Services\StreamService;
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

Route::get('/', fn (StreamService $streamService) => view("home", ["currentStream" => $streamService->currentStream()]))->name("home");

Route::post("user/register/endpoint", [UserController::class, "endpoint"]);

// Обычный пользователь
Route::group(["middleware" => ['auth', 'can.showMarathon', 'role:user']], function() {
    Route::get("first-quiz", [FirstQuizController::class, "index"])->name("first_quiz.index");
    Route::get("first-quiz/success", [FirstQuizController::class, "success"])->name("first_quiz.success");
    Route::post("first-quiz", [FirstQuizController::class, "store"])->name("first_quiz.store");

    Route::get("results/before", [ResultController::class, "before"])->name("result.before");
    Route::get("results", [ResultController::class, "index"])->name("result.index");
    Route::post("results", [ResultController::class, "store"])->name("result.store");
    Route::put("results/update-photo", [ResultController::class, "updatePhoto"])->name("result.updatePhoto");

    Route::get("marathon", [MarathonController::class, "index"])->name("marathon.index");
    Route::get("marathon/{week}", [MarathonController::class, "indexWeek"])->where('id', '[0-9]+')->name("marathon.index.week");

    Route::get("check-in", [CheckInController::class, "index"])->name("check-in.index");
    Route::post("check-in", [CheckInController::class, "store"])->name("check-in.store");
    Route::put("check-in", [CheckInController::class, "update"])->name("check-in.update");

    Route::get("materials", [MaterialsController::class, "index"])->name("materials.index");
});

// Админ
Route::group(["middleware" => ['auth', 'role:admin']], function() {
    Route::get("meal-plan", [MealPlanController::class, "index"])->name("mealPlan.index");
    Route::get("meal-plan/create", [MealPlanController::class, "create"])->name("mealPlan.create");
    Route::get("meal-plan/configurator", [MealPlanController::class, "configurator"])->name("mealPlan.configurator");
    Route::post("meal-plan/configurator", [MealPlanController::class, "configuratorSend"])->name("mealPlan.configurator.send");
    Route::get("meal-plan/{item}", [MealPlanController::class, "edit"])->name("mealPlan.edit");
    Route::post("meal-plan", [MealPlanController::class, "store"])->name("mealPlan.store");
    Route::put("meal-plan/{item}", [MealPlanController::class, "update"])->name("mealPlan.update");
    Route::delete("meal-plan/{item}", [MealPlanController::class, "delete"])->name("mealPlan.delete");

    Route::get("streams", [StreamController::class, "index"])->name("stream.index");
    Route::get("streams/{item}", [StreamController::class, "view"])->name("stream.view");
    Route::post("streams", [StreamController::class, "store"])->name("stream.store");
    Route::put("streams", [StreamController::class, "update"])->name("stream.update");
    Route::delete("streams/{item}", [StreamController::class, "delete"])->name("stream.delete");

    Route::get("programs", [ProgramController::class, "index"])->name("program.index");
    Route::get("programs/{item}", [ProgramController::class, "view"])->name("program.view");
    Route::post("programs", [ProgramController::class, "store"])->name("program.store");
    Route::put("programs", [ProgramController::class, "update"])->name("program.update");
    Route::post("programs/{item}", [ProgramController::class, "duplicate"])->name("program.duplicate");
    Route::delete("programs/{item}", [ProgramController::class, "delete"])->name("program.delete");

    //Route::get("trainings", [TrainingController::class, "index"])->name("training.index");
    Route::get("programs/{item}/trainings/{week}", [TrainingController::class, "indexWeek"])->where('id', '[0-9]+')->name("training.index.week");
    Route::get("programs/{item}/trainings/{week}/create", [TrainingController::class, "create"])->where('id', '[0-9]+')->name("training.index.create");
    Route::get("programs/{item}/trainings/{training}/edit", [TrainingController::class, "edit"])->name("training.edit");

    Route::post("trainings", [TrainingController::class, "store"])->name("training.store");
    Route::put("trainings/{training}", [TrainingController::class, "update"])->name("training.update");
    Route::delete("trainings/{training}", [TrainingController::class, "delete"])->name("training.delete");
    Route::post("trainings/{training}", [TrainingController::class, "duplicate"])->name("training.duplicate");

    Route::get("user/{user}/view", [UserController::class, "view"])->name("user.view");
    Route::post("user", [UserController::class, "store"])->name("user.store");
    Route::delete("user", [UserController::class, "delete"])->name("user.delete");
    Route::put("user/answer-admin", [UserController::class, "answerAdmin"])->name("user.answerAdmin");
    Route::put("user/{user}", [UserController::class, "updateMenu"])->name("user.update.menu");
});

// Общие
Route::group(["middleware" => ['auth']], function() {
    Route::get("profile", [ProfileController::class, "index"])->name("profile.index");
    Route::put("profile", [ProfileController::class, "storeCredentials"])->name("profile.storeCredentials");
    Route::put("profile/password", [ProfileController::class, "changePassword"])->name("profile.changePassword");
    Route::put("profile/lang", [ProfileController::class, "changeLang"])->name("profile.changeLang");
});

// Переопределяю методы авторизации
Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
    ->middleware(['guest'])
    ->name('password.email');

Route::post('reset-password', [AuthController::class, 'resetPassword'])
    ->middleware(['guest'])
    ->name('password.update');

