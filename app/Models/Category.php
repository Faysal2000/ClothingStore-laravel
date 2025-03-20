<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';

    protected $fillable = [
        'name',
        'description',
        'imagepath',
        'price',
    ];

    // العلاقة بين المنتج والفئة
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // 🔹 دالة لحفظ البيانات باستخدام `create()`
    public static function createCategory($data)
    {
        return self::create($data);
    }
}
