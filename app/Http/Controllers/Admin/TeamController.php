<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\{Team, Player, Coach, Goal, Yellow, Red, Schedule};

class TeamController extends Controller
{
    public function index() {
        $teams = Team::all();
        return view('admin.team')->with(compact('teams'));
    }
    public function addTeam(Request $request) {
        //validate
        $validate = $request->validate([
            'name' => 'bail|required|min:3|max:255',
            'image' => 'bail|required|mimes:jpg,png,jpeg|max:2048',
            'group' => 'bail|required|min:1|max:2'
        ]);

        //save image
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $imageLoc = 'assets/image/team';
        $imageNames = $imageLoc.'/'.$imageName;
        $image->move(public_path($imageLoc), $imageName);

        $team = new Team();
        $team->name = $request->name;
        $team->group = $request->group;
        $team->image = $imageNames;
        if($request->achievement) {
            $team->achievement = $request->achievement;
        }
        if($request->note) {
            $team->note = $request->note;
        }
        $team->save();

        return redirect('/admin/team');
    }
    public function editTeam(Request $request, $id) {
        //validate
        $validate = $request->validate([
            'name' => 'bail|required|min:3|max:255',
            'image' => 'bail|nullable|mimes:jpg,png,jpeg|max:2048',
            'group' => 'bail|required|min:1|max:2'
        ]);

        
        $team = Team::where('id', $id)->first();

        $team_image = $team->image;

        $team->name = $request->name;
        //save image
        if($request->image) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $imageLoc = 'assets/image/team';
            $imageNames = $imageLoc.'/'.$imageName;
            $image->move(public_path($imageLoc), $imageName);
            $team->image = $imageNames;
            File::delete(public_path($team_image));
        }
        $team->achievement = $request->achievement;
        $team->group = $request->group;
        $team->note = $request->note;
        $team->save();


        return redirect('/admin/team');
    }
    public function deleteTeam(Request $request, $id) {
        $team = Team::where('id', $id)->first();

        Player::where('team_id', $id)->delete();
        Goal::where('team_id', $id)->delete();
        Yellow::where('team_id', $id)->delete();
        Red::where('team_id', $id)->delete();
        Schedule::where('team_1', $id)->orWhere('team_2', $id)->delete();
        Coach::where('team_id', $id)->delete();

        $team->delete();

        return redirect('/admin/team');
    }
    public function detailTeam($tm) {
        $team = Team::where('name', $tm)->first();

        return view('admin.team-detail')->with(compact('team', 'tm'));
    }
}
