<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamSeeder extends Seeder
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
                'name' => 'Jepang',
                'image' => 'assets/image/team/japan.png',
                'captain_id' => '1',
                'main_coach_id' => '1',
                'group' => 'E'
            ], [
                'name' => 'Jerman',
                'image' => 'assets/image/team/germany.png',
                'captain_id' => '2',
                'main_coach_id' => '2',
                'group' => 'E'
            ], [
                'name' => 'Spanyol',
                'image' => 'assets/image/team/spain.png',
                'captain_id' => '3',
                'main_coach_id' => '3',
                'group' => 'E'
            ], [
                'name' => 'Kosta Rika',
                'image' => 'assets/image/team/costarica.png',
                'captain_id' => '4',
                'main_coach_id' => '4',
                'group' => 'E'
            ]
        ];

        foreach($data as $d) {
            Team::create($d);
        }
    }
}
