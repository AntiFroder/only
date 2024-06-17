<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Random\Randomizer;

class RoleCarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::get();
        $carCategories = CarCategory::pluck('id')->toArray();
        $randomize = new Randomizer();
        $roles->each(function ($role) use ($randomize, $carCategories) {
            $needleCategories = $randomize->pickArrayKeys(array_flip($carCategories), rand(1,2));
            $role->carCategories()->sync($needleCategories);
        });
    }
}
