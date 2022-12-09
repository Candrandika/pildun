<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Team, Player};

class TopController extends Controller
{
    public function topTeam(Request $request) {
        $group = Team::groupBy('group')->select('group')->get();
        if($request->group) {
            $team = Team::where('group', $request->group)->withCount('goal')->orderBy('goal_count', 'desc')->get();
        } else {
            $team = Team::withCount('goal')->orderBy('goal_count', 'desc')->get();
        }

        return view('top-team')->with(compact('team', 'group'));
    }
    public function topPlayer(Request $request) {
        $teams = Team::all();
        if($request->group) {
            $team = Team::where('name', $request->group)->first();
            if($team) {
                $player = Player::where('team_id', $team->id)->withCount('goal')->orderBy('goal_count', 'desc')->get();
            } else {
                $player = [];
            }
        } else {
            $player = Player::withCount('goal')->orderBy('goal_count', 'desc')->get();
        }

        return view('top-player')->with(compact('player', 'teams'));
    }
    public function topRed(Request $request) {
        $group = Team::groupBy('group')->select('group')->get();

        if($request->group) {
            $team = Team::where('group', $request->group)->withCount('red')->orderBy('red_count', 'desc')->get();
        } else {
            $team = Team::withCount('red')->orderBy('red_count', 'desc')->get();
        }

        return view('top-red')->with(compact('team', 'group'));
    }
}
