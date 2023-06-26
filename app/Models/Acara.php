<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acara extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tiket(){
        return $this->hasMany(Tiket::class, 'acara_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
