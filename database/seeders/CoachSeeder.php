<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coach;

class CoachSeeder extends Seeder
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
                'team_id' => 1,
                'name' => 'Pelatih Jepang 1',
                'alias' => 'PelatihJepang',
                'position' => 'Pelatih Utama'
            ],
            [
                'team_id' => 2,
                'name' => 'Pelatih Jerman 1',
                'alias' => 'PelatihJerman',
                'position' => 'Pelatih Utama'
            ],
            [
                'team_id' => 3,
                'name' => 'Pelatih Spanyol 1',
                'alias' => 'PelatihSpanyol',
                'position' => 'Pelatih Utama'
            ],
            [
                'team_id' => 4,
                'name' => 'Pelatih Kosta Rika 1',
                'alias' => 'PelatihKosta',
                'position' => 'Pelatih Utama'
            ],
            [
                'team_id' => 1,
                'name' => 'Pelatih Jepang 2',
                'alias' => 'PelatihJpg',
                'position' => 'Pelatih Tambahan'
            ],
        ];

        foreach($data as $d) {
            Coach::create($d);
        }
    }
}
