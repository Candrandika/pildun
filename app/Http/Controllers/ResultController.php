<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Result, Schedule, Team};

class ResultController extends Controller
{
    public function index()
    {
        $results = Schedule::where('time', '<', now())->orderBy('time','desc')->get();

        return view('result')->with(compact('results'));
    }

    // API
    public function getAllResults() {
        return response()->json(['results' => Schedule::where('time', '>', now())->orderBy('time', 'desc')->get()]);
    }
    public function getTeamResults($team_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        $result = Schedule::where('team_1', $team->id)->orWhere('team_2', $team->id)->get();

    }
}
