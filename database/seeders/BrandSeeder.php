<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => $name = 'Toyota',
            'slug'=>str($name)->slug()
        ]);
        Brand::create([
            'name' => $name = 'Daihatsu',
            'slug'=>str($name)->slug()
        ]);
        Brand::create([
            'name' => $name = 'Honda',
            'slug'=>str($name)->slug()
        ]);
        Brand::create([
            'name' => $name = 'Wuling',
            'slug'=> str($name)->slug()
        ]);
        Brand::create([
            'name' => $name = 'Datsun',
            'slug'=> str($name)->slug()
        ]);
    }
}
