<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Team, Player};

class PlayerController extends Controller
{
    public function index($tm) {
        $team = Team::where('name', $tm)->first();
        
        $player = Player::where('team_id', $team->id)->orderBy('number', 'asc')->get();

        return view('player')->with(compact('player', 'tm'));
    }

    //API
    public function getTeamPlayers($team_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        return response()->json(['players' => $team->player]);
    }
    public function getPlayer($team_name, $player_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        $player = Player::where('team_id', $team->id)->where('name', $player_name)->first();

        if(!$player) {
            return response()->json(['error' => 'Pemain tidak ditemukan!']);
        }

        return response()->json(['player' => $player]);
    }
}
