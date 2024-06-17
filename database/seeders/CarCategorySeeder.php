<?php

namespace Database\Seeders;

use App\Models\CarCategory;
use Illuminate\Database\Seeder;

class CarCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Категория 1'],
            ['title' => 'Категория 2'],
            ['title' => 'Категория 3'],
            ['title' => 'Категория 4'],
            ['title' => 'Категория 5'],
        ];
        if (!CarCategory::query()->exists()) {
            CarCategory::insert($categories);
        }
    }
}
