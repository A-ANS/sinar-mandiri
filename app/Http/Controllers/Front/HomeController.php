<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;

class HomeController extends Controller {
    public function index() {
        $brands = Brand::withCount('cars')->get();
        $featuredCars = Car::with('brand')->where('status', 'tersedia')->latest()->take(6)->get();
        $totalCars = Car::where('status', 'tersedia')->count();
        return view('front.home', compact('brands', 'featuredCars', 'totalCars'));
    }
}
