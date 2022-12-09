<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Schedule, Team, Goal, Yellow, Red};

class ScheduleController extends Controller
{
    public function index() {
        $schedule = Schedule::orderBy('time', 'desc')->get();
        $team = Team::all();
        return view('admin.schedule')->with(compact('schedule', 'team'));
    }
    public function addSchedule(Request $request) {
        $validate = $request->validate([
            'time' => 'bail|required|after:'.now(),
            'group' => 'bail|required|min:1|max:1',
            'round' => 'bail|required|min:3|max:255',
            'team_1' => 'bail|required|different:team_2'
        ]);

        $tim1 = Team::where('id', $request->team_1)->first();
        $tim2 = Team::where('id', $request->team_2)->first();
        $title = $tim1->name.' vs '.$tim2->name;

        $sch = new Schedule();
        $sch->time = $request->time;
        $sch->name = $title;
        $sch->group = $request->group;
        $sch->round = $request->round;
        $sch->team_1 = $request->team_1;
        $sch->team_2 = $request->team_2;
        $sch->note = $request->note;
        $sch->save();

        return redirect('admin/schedule');
    }
    public function detailSchedule($id) {
        $schedule = Schedule::where('id', $id)->first();

        //team
        $team1 = Team::where('id', $schedule->team_1)->first();
        $team2 = Team::where('id', $schedule->team_2)->first();

        //goal
        $goal1 = Goal::where('schedule_id', $id)->where('team_id', $team1->id)->get();
        $goal2 = Goal::where('schedule_id', $id)->where('team_id', $team2->id)->get();
        
        //yellow
        $yellow1 = Yellow::where('schedule_id', $id)->where('team_id', $team1->id)->get();
        $yellow2 = Yellow::where('schedule_id', $id)->where('team_id', $team2->id)->get();
        
        //red
        $red1 = Red::where('schedule_id', $id)->where('team_id', $team1->id)->get();
        $red2 = Red::where('schedule_id', $id)->where('team_id', $team2->id)->get();

        return view('admin.schedule-detail')->with(compact('schedule', 'team1', 'team2', 'goal1', 'goal2', 'yellow1', 'yellow2', 'red1', 'red2'));
    }
    public function editSchedule(Request $request, $id) {
        $sch = Schedule::where('id', $id)->first();

        $validate = $request->validate([
            'time' => 'bail|required|after:'.$sch->created_at,
            'group' => 'bail|required|min:1|max:1',
            'round' => 'bail|required|min:3|max:255',
            'team_1' => 'bail|required|different:team_2'
        ]);

        $tim1 = Team::where('id', $request->team_1)->first();
        $tim2 = Team::where('id', $request->team_2)->first();
        $title = $tim1->name.' vs '.$tim2->name;

        $sch->time = $request->time;
        $sch->name = $title;
        $sch->group = $request->group;
        $sch->round = $request->round;
        $sch->team_1 = $request->team_1;
        $sch->team_2 = $request->team_2;
        $sch->note = $request->note;
        $sch->save();

        return redirect('admin/schedule');
    }
    public function deleteSchedule(Request $request, $id) {
        $schedule = Schedule::where('id', $id)->first();
        Goal::where('schedule_id', $id)->delete();
        Yellow::where('schedule_id', $id)->delete();
        Red::where('schedule_id', $id)->delete();
        $schedule->delete();

        return redirect('admin/schedule');
    }
}
