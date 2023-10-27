<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;


class Bunga extends Model
{
    use HasFactory, Uuid;
    
    protected $fillable = [
        'name',
        'harga',
        'image',
        'tipe',
        'description',
        'stock'
    ];
    protected $appends = ['imagedir'];
    public function getImagedirAttribute()
    {
        return asset('storage/ProductImage/' . $this->image);
    }
   
}


