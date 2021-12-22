<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Administrador',
            ],
            [
                'id'    => 2,
                'title' => 'Usuário',
            ],
            [
                'id'    => 3,
                'title' => 'Gerente',
            ],
            [
                'id'    => 4,
                'title' => 'Editor',
            ],
        ];

        Role::insert($roles);
    }
}
