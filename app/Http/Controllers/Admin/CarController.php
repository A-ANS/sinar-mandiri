<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller {
    public function index() {
        $cars = Car::with('brand')->latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }
    public function create() {
        $brands = Brand::all();
        return view('admin.cars.create', compact('brands'));
    }
    public function store(Request $request) {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string',
            'type' => 'required|string',
            'year' => 'required|integer|min:1990|max:2030',
            'price' => 'required|integer|min:0',
            'condition' => 'required|in:baru,bekas',
            'color' => 'required|string',
            'mileage' => 'required|integer|min:0',
            'transmission' => 'required|string',
            'fuel' => 'required|string',
            'seats' => 'required|integer|min:2',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);
        $data = $request->except(['thumbnail','images','_token']);
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('cars', 'public');
        }
        $car = Car::create($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('cars/gallery', 'public');
                CarImage::create(['car_id' => $car->id, 'image' => $path]);
            }
        }
        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }
    public function edit(Car $car) {
        $brands = Brand::all();
        $car->load('images');
        return view('admin.cars.edit', compact('car', 'brands'));
    }
    public function update(Request $request, Car $car) {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string',
            'type' => 'required|string',
            'year' => 'required|integer',
            'price' => 'required|integer',
            'condition' => 'required|in:baru,bekas',
            'color' => 'required|string',
            'mileage' => 'required|integer',
            'transmission' => 'required|string',
            'fuel' => 'required|string',
            'seats' => 'required|integer',
            'thumbnail' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
        ]);
        $data = $request->except(['thumbnail','images','_token','_method']);
        if ($request->hasFile('thumbnail')) {
            if ($car->thumbnail) Storage::disk('public')->delete($car->thumbnail);
            $data['thumbnail'] = $request->file('thumbnail')->store('cars', 'public');
        }
        $car->update($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('cars/gallery', 'public');
                CarImage::create(['car_id' => $car->id, 'image' => $path]);
            }
        }
        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil diperbarui.');
    }
    public function destroy(Car $car) {
        if ($car->thumbnail) Storage::disk('public')->delete($car->thumbnail);
        foreach ($car->images as $img) Storage::disk('public')->delete($img->image);
        $car->delete();
        return back()->with('success', 'Mobil berhasil dihapus.');
    }
}
