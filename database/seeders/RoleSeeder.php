<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'display_name' => 'Роль 1',
                'name' => Str::slug('Роль 1')
            ],
            [
                'display_name' => 'Роль 2',
                'name' => Str::slug('Роль 2')
            ],
            [
                'display_name' => 'Роль 3',
                'name' => Str::slug('Роль 3')
            ],
            [
                'display_name' => 'Роль 4',
                'name' => Str::slug('Роль 4')
            ],
            [
                'display_name' => 'Роль 5',
                'name' => Str::slug('Роль 5')
            ],
        ];
        if (!Role::query()->exists()) {
            Role::insert($roles);
        }
    }
}
