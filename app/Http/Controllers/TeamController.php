<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        if($request->search) {
            $teams = Team::where('name', 'like', '%'.$request->search.'%')->orderBy('group', 'asc')->get();
        } else {
            $teams = Team::orderBy('group', 'asc')->get();   
        }
        return view('team')->with(compact('teams'));
    }

    //API
    public function getAllTeams() {
        return response()->json(['teams' => Team::orderBy('group', 'asc')]);
    }
}
