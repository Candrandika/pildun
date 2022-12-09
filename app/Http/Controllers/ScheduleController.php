<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Schedule, Team};

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::where('time', '>', now())->orderBy('time', 'asc')->get();
        return view('schedule')->with(compact('schedule'));
    }
    public function team($tm)
    {
        $team = Team::where('name', $tm)->first();
        $schedule = Schedule::where('team_1', $team->id)->orWhere('team_2', $team->id)->orderBy('time', 'desc')->get();

        return view('team-schedule')->with(compact('tm', 'schedule'));
    }

    //API
    public function getAllSchedules() {
        return response()->json(['schedules' => Schedule::orderBy('time', 'desc')->get()]);
    }
    public function getMissSchedules() {
        return response()->json(['schedules' => Schedule::orderBy('time', 'asc')->where('time', '>', now())->get()]);
    }
    public function getPresentSchedules() {
        return response()->json(['schedules' => Schedule::orderBy('time', 'desc')->where('time', '<', now())->get()]);
    }

    public function getTeamAllSchedule($team_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        $schedule = Schedule::where('team_id', $team->id)->orderBy('time', 'desc')->get();
        
        return response()->json(['schedules' => $schedule]);
    }
    public function getTeamMissSchedule($team_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        $schedule = Schedule::where('team_id', $team->id)->where('time', '>', now())->orderBy('time', 'desc')->get();
        
        return response()->json(['schedules' => $schedule]);
    }
    public function getTeamPresentSchedule($team_name) {
        $team = Team::where('name', $team_name)->first();

        if(!$team) {
            return response()->json(['error' => 'Tim tidak ditemukan!']);
        }

        $schedule = Schedule::where('team_id', $team->id)->where('time', '<', now())->orderBy('time', 'asc')->get();
        
        return response()->json(['schedules' => $schedule]);
    }
}
