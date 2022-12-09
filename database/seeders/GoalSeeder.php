<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Goal;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'schedule_id' => 1,
                'team_id' => 1,
                'player_id' => 1
            ],
            [
                'schedule_id' => 1,
                'team_id' => 1,
                'player_id' => 1
            ]
        ];

        foreach($data as $d) {
            Goal::create($d);
        }
    }
}
