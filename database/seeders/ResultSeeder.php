<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Result;

class ResultSeeder extends Seeder
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
                'score_1' => 2,
                'score_2' => 0
            ]
        ];

        foreach($data as $d) {
            Result::create($d);
        }
    }
}
