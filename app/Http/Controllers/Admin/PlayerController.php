<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Team, Player, Goal, Yellow, Red};

class PlayerController extends Controller
{
    public function index($tm) {
        $team = Team::where('name', $tm)->first();
        $player = Player::where('team_id', $team->id)->orderBy('number', 'asc')->get();

        return view('admin.player')->with(compact('player', 'tm'));
    }
    public function addPlayer(Request $request, $tm) {
        $validate = $request->validate([
            'name' => 'bail|required|min:3|max:255',
            'alias' => 'bail|required|min:3|max:255',
            'position' => 'bail|required|min:3|max:255',
            'number' => 'bail|required|integer|min:1|max:99'
        ]);

        $team = Team::where('name', $tm)->first();

        $player = new Player();
        $player->team_id = $team->id;
        $player->name = $request->name;
        $player->alias = $request->alias;
        $player->position = $request->position;
        $player->number = $request->number;
        $player->achievement = $request->achievement;
        $player->note = $request->catatan;
        $player->save();

        if($request->captain) {
            $team->captain_id = $player->id;
            $team->save();
        }

        return redirect('admin/team/'.$tm.'/player');
    }
    public function editPlayer(Request $request, $tm, $id) {
        $validate = $request->validate([
            'name' => 'bail|required|min:3|max:255',
            'alias' => 'bail|required|min:3|max:255',
            'position' => 'bail|required|min:3|max:255',
            'number' => 'bail|required|integer|min:1|max:99'
        ]);

        $team = Team::where('name', $tm)->first();

        $player = Player::where('id', $id)->first();
        $player->name = $request->name;
        $player->alias = $request->alias;
        $player->position = $request->position;
        $player->number = $request->number;
        $player->achievement = $request->achievement;
        $player->note = $request->catatan;
        $player->save();

        if($request->captain) {
            $team->captain_id = $player->id;
            $team->save();
        }

        return redirect('admin/team/'.$tm.'/player');
    }
    public function deletePlayer(Request $request, $tm, $id) {
        $player = Player::where('id', $id)->first();
        Goal::where('player_id', $id)->delete();
        Yellow::where('player_id', $id)->delete();
        Red::where('player_id', $id)->delete();
        $player->delete();

        return redirect('admin/team/'.$tm.'/player');
    }
}
