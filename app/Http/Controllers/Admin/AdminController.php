<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Team, Player, Schedule};

class AdminController extends Controller
{
    public function index() {
        $team_count = Team::count();
        $player_count = Player::count();
        $schedule_count = Schedule::count();
        $match = Schedule::orderby('time', 'desc')->limit(5)->get();
        $teams = Team::orderBy('group')->get();
        return view('admin.index')->with(compact('team_count', 'player_count', 'schedule_count', 'match', 'teams'));
    }
}
