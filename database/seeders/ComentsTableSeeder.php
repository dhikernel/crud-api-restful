<?php

namespace Database\Seeders;

use App\Models\Coment;
use Illuminate\Database\Seeder;

class ComentsTableSeeder extends Seeder
{
    public function run()
    {
        $coments = [
            [
                'id_user'         => '2',
                'id_post'           => '1',
                'coment'         => 'My First Coment'
            ],
            [
                'id_user'         => '2',
                'id_post'           => '1',
                'coment'          => 'My Secund Coment'
            ],
        ];

        Coment::insert($coments);
    }
}
