<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;

class UpdateCarThumbnailSeeder extends Seeder
{
    public function run(): void
    {
        $thumbnails = [
            [
                'brand' => 'Toyota', 'name' => 'Avanza 1.3', 'year' => 2023,
                'thumbnail' => 'cars/toyota-avanza.jpg',
            ],
            [
                'brand' => 'Toyota', 'name' => 'Fortuner', 'year' => 2022,
                'thumbnail' => 'cars/toyota-fortuner.jpg',
            ],
            [
                'brand' => 'Honda', 'name' => 'CR-V', 'year' => 2022,
                'thumbnail' => 'cars/honda-crv.jpg',
            ],
            [
                'brand' => 'Honda', 'name' => 'Jazz', 'year' => 2023,
                'thumbnail' => 'cars/honda-jazz.jpg',
            ],
            [
                'brand' => 'Mitsubishi', 'name' => 'Xpander', 'year' => 2023,
                'thumbnail' => 'cars/mitsubishi-xpander.jpg',
            ],
            [
                'brand' => 'Daihatsu', 'name' => 'Xenia', 'year' => 2021,
                'thumbnail' => 'cars/daihatsu-xenia.jpg',
            ],
        ];

        foreach ($thumbnails as $data) {
            $brand = Brand::where('name', $data['brand'])->first();
            if (!$brand) continue;

            Car::where('brand_id', $brand->id)
               ->where('name', $data['name'])
               ->where('year', $data['year'])
               ->update(['thumbnail' => $data['thumbnail']]);

            $this->command->info("✓ {$data['brand']} {$data['name']} {$data['year']}");
        }
    }
}
