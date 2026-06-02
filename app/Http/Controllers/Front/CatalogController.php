<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Message;
use Illuminate\Http\Request;

class CatalogController extends Controller {
    public function index(Request $request) {
        $query = Car::with('brand')->where('status', 'tersedia');

        if ($request->brand) $query->where('brand_id', $request->brand);
        if ($request->condition) $query->where('condition', $request->condition);
        if ($request->min_price) $query->where('price', '>=', $request->min_price);
        if ($request->max_price) $query->where('price', '<=', $request->max_price);
        if ($request->transmission) $query->where('transmission', $request->transmission);
        if ($request->search) $query->where('name', 'like', '%'.$request->search.'%');

        $cars = $query->latest()->paginate(9)->withQueryString();
        $brands = Brand::all();
        return view('front.catalog.index', compact('cars', 'brands'));
    }

    public function show(Car $car) {
        $car->load('brand', 'images');
        $related = Car::with('brand')->where('brand_id', $car->brand_id)
            ->where('id', '!=', $car->id)->where('status', 'tersedia')->take(3)->get();
        return view('front.catalog.show', compact('car', 'related'));
    }

    public function contact() {
        $cars = Car::where('status', 'tersedia')->get();
        return view('front.contact', compact('cars'));
    }

    public function sendMessage(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
        Message::create($request->only('name','email','phone','car_id','message'));
        return back()->with('success', 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
