<?php

namespace App\Models;

use App\Models\User;
use App\Models\Acara;
use App\Models\Event;
use App\Models\Order;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function acara(){
        return $this->belongsTo(Acara::class);
    }

    public function venue(){
        return $this->belongsTo(Venue::class);
    }

    public function order(){
        return $this->hasMany(Order::class, 'tiket_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
