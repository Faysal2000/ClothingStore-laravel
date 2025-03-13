<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //العلاقة العكسية بين المنتج والفئة
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'imagepath'
    ];
}
