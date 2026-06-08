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
            ['name' => 'Toyota', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/toyota.png'],
            ['name' => 'Honda', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/honda.png'],
            ['name' => 'Mitsubishi', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/mitsubishi.png'],
            ['name' => 'Daihatsu', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/daihatsu.png'],
            ['name' => 'Suzuki', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/suzuki.png'],
            ['name' => 'Nissan', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/nissan.png'],
            ['name' => 'Mazda', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/mazda.png'],
            ['name' => 'Wuling', 'classification' => 'Tiongkok', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/ee/Wuling_Motors_logo.svg'],
            ['name' => 'Hyundai', 'classification' => 'Korea Selatan', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/hyundai.png'],
            ['name' => 'Kia', 'classification' => 'Korea Selatan', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/kia.png'],
            ['name' => 'BMW', 'classification' => 'Eropa', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/bmw.png'],
            ['name' => 'Mercedes-Benz', 'classification' => 'Eropa', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/mercedes-benz.png'],
            ['name' => 'Ford', 'classification' => 'Amerika', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/ford.png'],
            ['name' => 'Chevrolet', 'classification' => 'Amerika', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/chevrolet.png'],
            ['name' => 'Datsun', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/datsun.png'],
            ['name' => 'Isuzu', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/isuzu.png'],
            ['name' => 'Lexus', 'classification' => 'Jepang', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/lexus.png'],
            ['name' => 'Peugeot', 'classification' => 'Eropa', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/peugeot.png'],
            ['name' => 'Renault', 'classification' => 'Eropa', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/renault.png'],
            ['name' => 'Volkswagen', 'classification' => 'Eropa', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/volkswagen.png'],
            ['name' => 'Volvo', 'classification' => 'Eropa', 'logo' => 'https://cdn.jsdelivr.net/gh/filippofilip95/car-logos-dataset@master/logos/optimized/volvo.png'],
        ];

        foreach ($brandsData as $data) {
            Brand::updateOrCreate(
                ['name' => $data['name']],
                ['classification' => $data['classification'], 'logo' => $data['logo']]
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
