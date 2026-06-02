<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Brand;
use App\Models\Car;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Admin Sinar Mandiri',
            'email' => 'admin@sinarmandiri.com',
            'password' => Hash::make('password'),
        ]);

        $brands = ['Toyota', 'Honda', 'Suzuki', 'Daihatsu', 'Mitsubishi', 'Nissan'];
        foreach ($brands as $b) {
            Brand::create(['name' => $b]);
        }

        $cars = [
            ['brand_id'=>1,'name'=>'Avanza','type'=>'MPV','year'=>2022,'price'=>180000000,'condition'=>'bekas','color'=>'Putih','mileage'=>25000,'transmission'=>'Manual','fuel'=>'Bensin','seats'=>7,'status'=>'tersedia','description'=>'Toyota Avanza 2022 kondisi mulus, servis rutin di bengkel resmi.'],
            ['brand_id'=>1,'name'=>'Kijang Innova','type'=>'MPV','year'=>2023,'price'=>350000000,'condition'=>'bekas','color'=>'Silver','mileage'=>15000,'transmission'=>'Otomatis','fuel'=>'Diesel','seats'=>7,'status'=>'tersedia','description'=>'Innova Reborn diesel 2023, terawat, pajak panjang.'],
            ['brand_id'=>2,'name'=>'Brio','type'=>'Hatchback','year'=>2023,'price'=>160000000,'condition'=>'baru','color'=>'Merah','mileage'=>0,'transmission'=>'Otomatis','fuel'=>'Bensin','seats'=>5,'status'=>'tersedia','description'=>'Honda Brio RS 2023 baru, irit bahan bakar, cocok untuk kota.'],
            ['brand_id'=>2,'name'=>'HR-V','type'=>'SUV','year'=>2022,'price'=>320000000,'condition'=>'bekas','color'=>'Hitam','mileage'=>20000,'transmission'=>'Otomatis','fuel'=>'Bensin','seats'=>5,'status'=>'tersedia','description'=>'Honda HR-V 2022 turbo, fitur lengkap, kondisi prima.'],
            ['brand_id'=>3,'name'=>'Ertiga','type'=>'MPV','year'=>2021,'price'=>195000000,'condition'=>'bekas','color'=>'Abu-abu','mileage'=>35000,'transmission'=>'Manual','fuel'=>'Bensin','seats'=>7,'status'=>'tersedia','description'=>'Suzuki Ertiga 2021 manual, kondisi bagus, harga nego.'],
            ['brand_id'=>4,'name'=>'Ayla','type'=>'City Car','year'=>2022,'price'=>120000000,'condition'=>'bekas','color'=>'Biru','mileage'=>18000,'transmission'=>'Manual','fuel'=>'Bensin','seats'=>5,'status'=>'tersedia','description'=>'Daihatsu Ayla 2022, irit, cocok untuk pemula.'],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
