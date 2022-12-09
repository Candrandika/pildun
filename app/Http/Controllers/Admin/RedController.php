<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Schedule, Red};

class RedController extends Controller
{
    public function addRed(Request $request, $id) {
        $t = $request->team;
        $player = $request->player;
        $schedule = Schedule::where('id', $id)->first();
        
        if($t == 1) {
            $team = $schedule->team_1;
        } elseif($t == 2) {
            $team = $schedule->team_2;
        }
        $goals = Red::where('schedule_id', $id)->where('team_id', $team)->where('player_id', $player)->first();

        if($goals) {
            return redirect('admin/schedule/'.$id)->with(['message' => 'Pemain sudah mendapatkan kartu merah']);
        }
        
        $goal = new Red();
        $goal->schedule_id = $id;
        $goal->team_id = $team;
        $goal->player_id = $player;
        $goal->save();

        return redirect('admin/schedule/'.$id);
    }
    public function editRed(Request $request, $id, $red) {
        $player = $request->player;

        $reds = Red::where('id', $red)->first();
        $reds->player_id = $player;
        $reds->save();

        return redirect('admin/schedule/'.$id);
    }
    public function deleteRed(Request $request, $id, $red) {
        $schedule = Schedule::where('id', $id)->first();
        
        $reds = Red::where('id', $red)->delete();

        return redirect('admin/schedule/'.$id);
    }
}
