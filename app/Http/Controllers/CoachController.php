<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Team, Coach};

class CoachController extends Controller
{
    public function index($tm) {
        $team = Team::where('name', $tm)->first();
        $coach = Coach::where('team_id', $team->id)->get();

        return view('coach')->with(compact('coach', 'tm'));
    }
    public function getTeamCoaches($team_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        return response()->json(['coaches' => $team->coach]);
    }
    public function getCoach($team_name, $coach_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        $coach = Coach::where('team_id', $team->id)->where('name', $coach_name)->first();

        if(!$coach) {
            return response()->json(['error' => 'Pelatih tidak ditemukan!']);
        }

        return response()->json(['coach' => $coach]);
    }
}
