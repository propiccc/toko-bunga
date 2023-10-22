<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuid;
use App\Models\Bunga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory, Uuid;

    protected $fillable = [
        'order_id',
        'bunga_id',
        'user_id',
        'alamat',
        'description',
        'status'
    ];

    protected $with = ['Product'];

    public function Product(){
        return $this->hasOne(Bunga::class, 'id', 'bunga_id');
    }
    public function User(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
