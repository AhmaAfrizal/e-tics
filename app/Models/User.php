<?php

namespace App\Models;

use App\Models\Acara;
use App\Models\Order;
use App\Models\Coment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_superadmin', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function order(){
        return $this->hasMany(Order::class, 'user_id');
    }

    public function  coment(){
        return $this->hasMany(Coment::class, 'user_id');
    }

    public function acara(){
        return $this->hasMany(Acara::class, 'user_id');
    }

    public function tiket(){
        return $this->hasMany(Tiket::class, 'user_id');
    }
}
