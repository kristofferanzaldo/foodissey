<?php

namespace App\Models;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'quantity', 'price','img',
    ];
    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
