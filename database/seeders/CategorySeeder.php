<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => $name = 'SUV',
            'slug'=>str($name)->slug()
        ]);
        Category::create([
            'name' => $name = 'Sedan',
            'slug'=>str($name)->slug()
        ]);
        Category::create([
            'name' => $name = 'Crossover',
            'slug'=>str($name)->slug()
        ]);
        Category::create([
            'name' => $name = 'LCGC',
            'slug'=> str($name)->slug()
        ]);
        Category::create([
            'name' => $name = 'MPV',
            'slug'=> str($name)->slug()
        ]);
    }
}
