<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Team, Coach};

class CoachController extends Controller
{
    public function index($tm) {
        $team = Team::where('name', $tm)->first();
        $coach = Coach::where('team_id', $team->id)->get();

        return view('admin.coach')->with(compact('coach', 'tm'));
    }
    public function addCoach(Request $request, $tm) {
        $validate = $request->validate([
            'name' => 'bail|required|min:3|max:255',
            'alias' => 'bail|required|min:3|max:255',
            'position' => 'bail|required|min:3|max:255'
        ]);

        $team = Team::where('name', $tm)->first();

        $coach = new Coach();
        $coach->team_id = $team->id;
        $coach->name = $request->name;
        $coach->alias = $request->alias;
        $coach->position = $request->position;
        $coach->achievement = $request->achievement;
        $coach->note = $request->note;
        $coach->save();

        if($request->captain) {
            $team->main_coach_id = $coach->id;
            $team->save();
        }

        return redirect('admin/team/'.$tm.'/coach');
    }
    public function editCoach(Request $request, $tm, $id) {
        $validate = $request->validate([
            'name' => 'bail|required|min:3|max:255',
            'alias' => 'bail|required|min:3|max:255',
            'position' => 'bail|required|min:3|max:255'
        ]);

        $team = Team::where('name', $tm)->first();

        $coach = Coach::where('id', $id)->first();
        $coach->name = $request->name;
        $coach->alias = $request->alias;
        $coach->position = $request->position;
        $coach->achievement = $request->achievement;
        $coach->note = $request->note;
        $coach->save();

        if($request->captain) {
            $team->main_coach_id = $coach->id;
            $team->save();
        }

        return redirect('admin/team/'.$tm.'/coach');
    }
    public function deleteCoach(Request $request, $tm, $id) {
        Coach::where('id', $id)->delete();

        return redirect('admin/team/'.$tm.'/coach');
    }
}
