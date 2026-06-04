<?php

<<<<<<< HEAD
namespace App\Models; // "A" dan "M" harus KAPITAL

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'role'];
=======
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
>>>>>>> d0cbcdfe2183facd8477fe0d0c77c93a43f940b9

    protected $hidden = ['password', 'remember_token'];
}