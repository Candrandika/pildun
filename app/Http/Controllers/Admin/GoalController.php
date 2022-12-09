<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Goal, Schedule, Player, Team};

class GoalController extends Controller
{
    public function addGoal(Request $request, $id) {
        $t = $request->team;
        $player = $request->player;
        $schedule = Schedule::where('id', $id)->first();
        
        if($t == 1) {
            $team = $schedule->team_1;
        } elseif($t == 2) {
            $team = $schedule->team_2;
        }

        $goal = new Goal();
        $goal->schedule_id = $id;
        $goal->team_id = $team;
        $goal->player_id = $player;
        $goal->save();

        $goals = Goal::where('schedule_id', $id)->where('team_id', $team)->get();

        if($t == 1) {
            $schedule->score_1 = $goals->count();
        } elseif($t == 2) {
            $schedule->score_2 = $goals->count();
        }
        $schedule->save();

        return redirect('admin/schedule/'.$id);
    }
    public function editGoal(Request $request, $id, $goal) {
        $player = $request->player;

        $goal = Goal::where('id', $goal)->first();
        $goal->player_id = $player;
        $goal->save();

        return redirect('admin/schedule/'.$id);
    }
    public function deleteGoal(Request $request, $id, $goal) {
        $t = $request->team;
        $schedule = Schedule::where('id', $id)->first();
        
        if($t == 1) {
            $team = $schedule->team_1;
        } elseif($t == 2) {
            $team = $schedule->team_2;
        }

        $goal = Goal::where('id', $goal)->delete();

        $goals = Goal::where('schedule_id', $id)->where('team_id', $team)->get();

        if($t == 1) {
            $schedule->score_1 = $goals->count();
        } elseif($t == 2) {
            $schedule->score_2 = $goals->count();
        }
        $schedule->save();

        return redirect('admin/schedule/'.$id);
    }
}
