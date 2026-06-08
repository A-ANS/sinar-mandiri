<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'kode_transaksi',
        'nama_pembeli',
        'telepon',
        'alamat',
        'metode_pembayaran',
        'harga',
        'status',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending'     => 'warning',
            'diproses'    => 'info',
            'selesai'     => 'success',
            'dibatalkan'  => 'danger',
            default       => 'secondary',
        };
    }
}
