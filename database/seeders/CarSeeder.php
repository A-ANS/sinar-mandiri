<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        // Create brands first
        $brandsData = [
            ['name' => 'Toyota', 'classification' => 'Jepang'],
            ['name' => 'Honda', 'classification' => 'Jepang'],
            ['name' => 'Mitsubishi', 'classification' => 'Jepang'],
            ['name' => 'Daihatsu', 'classification' => 'Jepang'],
            ['name' => 'Suzuki', 'classification' => 'Jepang'],
            ['name' => 'Nissan', 'classification' => 'Jepang'],
            ['name' => 'Mazda', 'classification' => 'Jepang'],
            ['name' => 'Wuling', 'classification' => 'Tiongkok'],
            ['name' => 'Hyundai', 'classification' => 'Korea Selatan'],
            ['name' => 'Kia', 'classification' => 'Korea Selatan'],
            ['name' => 'BMW', 'classification' => 'Eropa'],
            ['name' => 'Mercedes-Benz', 'classification' => 'Eropa'],
            ['name' => 'Ford', 'classification' => 'Amerika'],
            ['name' => 'Chevrolet', 'classification' => 'Amerika'],
            ['name' => 'Datsun', 'classification' => 'Jepang'],
            ['name' => 'Isuzu', 'classification' => 'Jepang'],
            ['name' => 'Lexus', 'classification' => 'Jepang'],
            ['name' => 'Peugeot', 'classification' => 'Eropa'],
            ['name' => 'Renault', 'classification' => 'Eropa'],
            ['name' => 'Volkswagen', 'classification' => 'Eropa'],
            ['name' => 'Volvo', 'classification' => 'Eropa'],
        ];

        foreach ($brandsData as $data) {
            $logo = 'https://ui-avatars.com/api/?name=' . urlencode($data['name']) . '&background=random&color=fff&size=128&bold=true';
            Brand::updateOrCreate(
                ['name' => $data['name']],
                ['classification' => $data['classification'], 'logo' => $logo]
            );
        }

        // Get brands
        $toyota = Brand::where('name', 'Toyota')->first();
        $honda = Brand::where('name', 'Honda')->first();
        $mitsubishi = Brand::where('name', 'Mitsubishi')->first();
        $daihatsu = Brand::where('name', 'Daihatsu')->first();

        // Create cars
        $cars = [
            [
                'brand_id' => $toyota->id,
                'name' => 'Avanza 1.3',
                'type' => 'MPV',
                'year' => 2023,
                'price' => 175000000,
                'condition' => 'baru',
                'color' => 'Putih',
                'mileage' => 0,
                'transmission' => 'Manual',
                'fuel' => 'Bensin',
                'seats' => 7,
                'description' => 'Toyota Avanza terbaru dengan fitur keselamatan modern',
                'status' => 'tersedia',
            ],
            [
                'brand_id' => $honda->id,
                'name' => 'CR-V',
                'type' => 'SUV',
                'year' => 2022,
                'price' => 385000000,
                'condition' => 'bekas',
                'color' => 'Hitam',
                'mileage' => 25000,
                'transmission' => 'Otomatis',
                'fuel' => 'Bensin',
                'seats' => 5,
                'description' => 'Honda CR-V dalam kondisi sangat baik, terawat dengan baik',
                'status' => 'tersedia',
            ],
            [
                'brand_id' => $mitsubishi->id,
                'name' => 'Xpander',
                'type' => 'MPV',
                'year' => 2023,
                'price' => 215000000,
                'condition' => 'baru',
                'color' => 'Silver',
                'mileage' => 0,
                'transmission' => 'Manual',
                'fuel' => 'Bensin',
                'seats' => 7,
                'description' => 'Mitsubishi Xpander dengan desain modern dan konsumsi BBM efisien',
                'status' => 'tersedia',
            ],
            [
                'brand_id' => $daihatsu->id,
                'name' => 'Xenia',
                'type' => 'MPV',
                'year' => 2021,
                'price' => 145000000,
                'condition' => 'bekas',
                'color' => 'Merah',
                'mileage' => 45000,
                'transmission' => 'Manual',
                'fuel' => 'Bensin',
                'seats' => 7,
                'description' => 'Daihatsu Xenia keluaran 2021, siap digunakan',
                'status' => 'tersedia',
            ],
            [
                'brand_id' => $toyota->id,
                'name' => 'Fortuner',
                'type' => 'SUV',
                'year' => 2022,
                'price' => 495000000,
                'condition' => 'bekas',
                'color' => 'Abu-abu',
                'mileage' => 35000,
                'transmission' => 'Otomatis',
                'fuel' => 'Diesel',
                'seats' => 7,
                'description' => 'Toyota Fortuner SUV premium dengan performa off-road terbaik',
                'status' => 'tersedia',
            ],
            [
                'brand_id' => $honda->id,
                'name' => 'Jazz',
                'type' => 'Hatchback',
                'year' => 2023,
                'price' => 225000000,
                'condition' => 'baru',
                'color' => 'Biru',
                'mileage' => 0,
                'transmission' => 'CVT',
                'fuel' => 'Bensin',
                'seats' => 5,
                'description' => 'Honda Jazz generasi terbaru dengan teknologi hybrid',
                'status' => 'tersedia',
            ],
        ];

        foreach ($cars as $car) {
            Car::firstOrCreate(
                ['brand_id' => $car['brand_id'], 'name' => $car['name'], 'year' => $car['year']],
                $car
            );
        }
    }
}
