<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;

class PlayerSeeder extends Seeder
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
                'name' => 'Maya Yoshida',
                'alias' => 'Yoshida',
                'number' => 22,
                'position' => 'Pemain Bertahan'
            ],
            [
                'team_id' => 2,
                'name' => 'Kapten Jerman',
                'alias' => 'Jerman',
                'number' => 11,
                'position' => 'Gelandang'
            ],
            [
                'team_id' => 3,
                'name' => 'Kapten Spanyol',
                'alias' => 'Spanyol',
                'number' => 1,
                'position' => 'Penjaga Gawang'
            ],
            [
                'team_id' => 4,
                'name' => 'Kapten Kosta Rika',
                'alias' => 'Kosta',
                'number' => 10,
                'position' => 'Pemain Depan'
            ],
            [
                'team_id' => 1,
                'name' => 'Tsubasa Ozora',
                'alias' => 'Tsubasa',
                'number' => 10,
                'position' => 'Gelandang'
            ],
            [
                'team_id' => 1,
                'name' => 'Kojirou Hyuga',
                'alias' => 'Hyuga',
                'number' => 9,
                'position' => 'Pemain Depan'
            ],
            [
                'team_id' => 1,
                'name' => 'Genzo Wakabayashi',
                'alias' => 'Wakabayashi',
                'number' => 1,
                'position' => 'Penjaga Gawang'
            ],
            [
                'team_id' => 1,
                'name' => 'Miki Yamane',
                'alias' => 'Yamane',
                'number' => 2,
                'position' => 'Pemain Bertahan'
            ],
            [
                'team_id' => 1,
                'name' => 'Shogo Taniguchi',
                'alias' => 'Taniguchi',
                'number' => 3,
                'position' => 'Pemain Bertahan'
            ],
            [
                'team_id' => 1,
                'name' => 'Kou Itakura',
                'alias' => 'Itakura',
                'number' => 4,
                'position' => 'Pemain Bertahan'
            ],
            [
                'team_id' => 1,
                'name' => 'Yuto Nagatomo',
                'alias' => 'Nagatomo',
                'number' => 5,
                'position' => 'Pemain Bertahan'
            ],
            [
                'team_id' => 1,
                'name' => 'Hiroki Ito',
                'alias' => 'Ito',
                'number' => 26,
                'position' => 'Pemain Bertahan'
            ],
            [
                'team_id' => 1,
                'name' => 'Ao Tanaka',
                'alias' => 'Tanaka',
                'number' => 17,
                'position' => 'Gelandang'
            ],
            [
                'team_id' => 1,
                'name' => 'Uzumaki Saburo',
                'alias' => 'Saburo',
                'number' => 99,
                'position' => 'Pemain Depan'
            ],
        ];

        foreach($data as $d) {
            Player::create($d);
        }
    }
}
