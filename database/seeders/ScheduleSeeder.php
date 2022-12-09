<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
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
                'time' => now(),
                'name' => 'Jepang vs Jerman',
                'group' => 'E',
                'round' => '32 Besar',
                'team_1' => 1,
                'team_2' => 2,
                'score_1' => 2,
                'score_2' => 0,
            ],
            [
                'time' => now(),
                'name' => 'Spanyol vs Kosta Rika',
                'group' => 'E',
                'round' => '32 Besar',
                'team_1' => 3,
                'team_2' => 4,
            ],
            [
                'time' => now(),
                'name' => 'Jepang vs Spanyol',
                'group' => 'E',
                'round' => '32 Besar',
                'team_1' => 1,
                'team_2' => 3
            ],
            [
                'time' => now(),
                'name' => 'Kosta Rika vs Jepang',
                'group' => 'E',
                'round' => '32 Besar',
                'team_1' => 4,
                'team_2' => 1,
            ],
        ];

        foreach($data as $d) {
            Schedule::create($d);
        }
    }
}
