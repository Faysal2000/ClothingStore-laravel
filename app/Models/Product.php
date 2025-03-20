<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'imagepath'
    ];

    //العلاقة العكسية بين المنتج والفئة
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
