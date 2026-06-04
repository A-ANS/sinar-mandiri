<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Message;

class DashboardController extends Controller {
    public function index() {
        $totalCars = Car::count();
        $availableCars = Car::where('status', 'tersedia')->count();
        $soldCars = Car::where('status', 'terjual')->count();
        $totalBrands = Brand::count();
        $unreadMessages = Message::where('status', 'unread')->count();
        $recentMessages = Message::with('car')->latest()->take(5)->get();
        $recentCars = Car::with('brand')->latest()->take(5)->get();
        return view('admin.dashboard', compact(
            'totalCars','availableCars','soldCars','totalBrands','unreadMessages','recentMessages','recentCars'
        ));
    }
}
