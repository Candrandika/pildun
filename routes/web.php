<?php

use App\Http\Controllers\{TopController, ScheduleController, TeamController, PlayerController, ResultController, AuthController, CoachController};
use App\Http\Controllers\Admin\{AdminController, PlayerController as AdminPlayer, ScheduleController as AdminSchedule, CoachController as AdminCoach, TeamController as AdminTeam, ResultController as AdminResult, GoalController as AdminGoal, YellowController as AdminYellow, RedController as AdminRed};
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

//user
Route::get('/', [ScheduleController::class, 'index']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/result', [ResultController::class, 'index']);
Route::get('/team/{country}', [ScheduleController::class, 'team']);
Route::get('/team/{country}/player', [PlayerController::class, 'index']);
Route::get('/team/{country}/coach', [CoachController::class, 'index']);
Route::get('/top-team', [TopController::class, 'topTeam']);
Route::get('/top-player', [TopController::class, 'topPlayer']);
Route::get('/top-red', [TopController::class, 'topRed']);

//auth
Route::get('/login', [AuthController::class, 'loginView'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

//admin
Route::middleware('admin')->prefix('admin')->group( function() {
    //dashboard
    Route::get('/', [AdminController::class, 'index']);

    //schedule
    Route::get('/schedule', [AdminSchedule::class, 'index']);
    Route::post('/schedule', [AdminSchedule::class, 'addSchedule']);
    Route::get('/schedule/{id}', [AdminSchedule::class, 'detailSchedule']);
    Route::post('/schedule/{id}/edit', [AdminSchedule::class, 'editSchedule']);
    Route::post('/schedule/{id}/delete', [AdminSchedule::class, 'deleteSchedule']);
    //goal
    Route::post('/schedule/{id}/goal', [AdminGoal::class, 'addGoal']);
    Route::post('/schedule/{id}/goal/{goal}/edit', [AdminGoal::class, 'editGoal']);
    Route::post('/schedule/{id}/goal/{goal}/delete', [AdminGoal::class, 'deleteGoal']);
    //yellow
    Route::post('/schedule/{id}/yellow', [AdminYellow::class, 'addYellow']);
    Route::post('/schedule/{id}/yellow/{yellow}/edit', [AdminYellow::class, 'editYellow']);
    Route::post('/schedule/{id}/yellow/{yellow}/delete', [AdminYellow::class, 'deleteYellow']);
    //red
    Route::post('/schedule/{id}/red', [AdminRed::class, 'addRed']);
    Route::post('/schedule/{id}/red/{red}/edit', [AdminRed::class, 'editRed']);
    Route::post('/schedule/{id}/red/{red}/delete', [AdminRed::class, 'deleteRed']);

    //team
    Route::get('/team', [AdminTeam::class, 'index']);
    Route::post('/team', [AdminTeam::class, 'addTeam']);
    Route::post('/team/{id_country}/edit', [AdminTeam::class, 'editTeam']);
    Route::post('/team/{id_country}/delete', [AdminTeam::class, 'deleteTeam']);
    Route::get('/team/{country}', [AdminTeam::class, 'detailTeam']);

    //player
    Route::get('/team/{country}/player', [AdminPlayer::class, 'index']);
    Route::post('/team/{country}/player', [AdminPlayer::class, 'addPlayer']);
    Route::post('/team/{country}/player/{id_player}/edit', [AdminPlayer::class, 'editPlayer']);
    Route::post('/team/{country}/player/{id_player}/delete', [AdminPlayer::class, 'deletePlayer']);

    //coach
    Route::get('/team/{country}/coach', [AdminCoach::class, 'index']);
    Route::post('/team/{country}/coach', [AdminCoach::class, 'addCoach']);
    Route::post('/team/{country}/coach/{id_coach}/edit', [AdminCoach::class, 'editCoach']);
    Route::post('/team/{country}/coach/{id_coach}/delete', [AdminCoach::class, 'deleteCoach']);
});