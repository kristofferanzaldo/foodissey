<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;
    protected $fillable =[
        'name', 'quantity', 'price', 'cod_resource'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
