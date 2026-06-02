<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    use HasFactory;
    protected $fillable = [
        'brand_id','name','type','year','price','condition',
        'color','mileage','transmission','fuel','seats',
        'description','status','thumbnail'
    ];

    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function images() {
        return $this->hasMany(CarImage::class);
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }
    public function getPriceFormattedAttribute() {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}
