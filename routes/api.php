<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ScheduleController, TeamController, PlayerController, CoachController, ResultController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/team', [TeamController::class, 'getAllTeams']);
Route::get('/player/{team}', [PlayerController::class, 'getTeamPlayers']);
Route::get('/player/{team}/{name}', [PlayerController::class, 'getPlayer']);
Route::get('/coach/{team}', [CoachController::class, 'getTeamCoaches']);
Route::get('/coach/{team}/{name}', [CoachController::class, 'getCoach']);

Route::get('/schedule/all', [ScheduleController::class, 'getAllSchedules']);
Route::get('/schedule/miss', [ScheduleController::class, 'getMissSchedules']);
Route::get('/schedule/present', [ScheduleController::class, 'getPresentSchedules']);
Route::get('/schedule/{team}/all', [ScheduleController::class, 'getTeamAllSchedules']);
Route::get('/schedule/{team}/miss', [ScheduleController::class, 'getTeamMissSchedules']);
Route::get('/schedule/{team}/present', [ScheduleController::class, 'getTeamPresentSchedules']);
Route::get('/result/{id}', [ResultController::class], 'getAllResult');
