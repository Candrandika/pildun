<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Schedule, Yellow};

class YellowController extends Controller
{
    public function addYellow(Request $request, $id) {
        $t = $request->team;
        $player = $request->player;
        $schedule = Schedule::where('id', $id)->first();
        
        if($t == 1) {
            $team = $schedule->team_1;
        } elseif($t == 2) {
            $team = $schedule->team_2;
        }
        $yellows = Yellow::where('schedule_id', $id)->where('team_id', $team)->where('player_id', $player)->first();

        if($yellows) {
            return redirect('admin/schedule/'.$id)->with(['message' => 'Pemain sudah mendapatkan kartu kuning']);
        }
        
        $yellow = new Yellow();
        $yellow->schedule_id = $id;
        $yellow->team_id = $team;
        $yellow->player_id = $player;
        $yellow->save();

        return redirect('admin/schedule/'.$id);
    }
    public function editYellow(Request $request, $id, $yellow) {
        $player = $request->player;

        $yellows = Yellow::where('id', $yellow)->first();
        $yellows->player_id = $player;
        $yellows->save();

        return redirect('admin/schedule/'.$id);
    }
    public function deleteYellow(Request $request, $id, $yellow) {
        $schedule = Schedule::where('id', $id)->first();
        
        $yellows = Yellow::where('id', $yellow)->delete();

        return redirect('admin/schedule/'.$id);
    }
}
