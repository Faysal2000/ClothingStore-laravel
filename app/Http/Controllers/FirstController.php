<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;



class FirstController extends Controller
{



    public function MainPage()
    {
        $categories = Category::all();
        return view('welcome', ['categories' => $categories]);
    }

    public function GetCategoryProducts($catid = null)
    {
        if ($catid) {
            $products = Product::where('category_id', $catid)->get();
            return view('product', ['products' => $products]);
        } else {
            $products = Product::all();
            return view('product', ['products' => $products]);
        }
    }



    public function GetAllCategoryWithProducts()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('category', compact('categories', 'products')); // إرسال المتغيرات للـ View
    }
}
