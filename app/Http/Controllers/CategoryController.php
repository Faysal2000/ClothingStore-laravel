<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;



class CategoryController extends Controller
{



    public function MainPage()
    {
        if (Auth::check()) {
            $categories = Category::all();
        } else {
            $categories = Category::take(2)->get();
        }
        return view('welcome', ['categories' => $categories]);
    }



    public function storeCategory(Request $request)
    {
        // التحقق من صحة البيانات قبل الحفظ
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'imagepath' => 'nullable|string|max:255',
            'price' => 'required|numeric',
        ]);

        // استدعاء الدالة الجديدة داخل الموديل
        Category::createCategory($validatedData);

        return redirect()->back()->with('success', 'تمت إضافة الفئة بنجاح!');
    }



    public function reviews()
    {
        $reviews = Review::all();
        return view('reviews', ['reviews' => $reviews]); //
    }


    public function storeReview(Request $request)
    {



        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:1000',
            'message' => 'required|string|max:1000',

        ]);

        // لحفظ البيانات بشكل مباشر
        Review::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect('/reviews');
    }




    public function GetCategoryProducts($catid = null)
    {
        if ($catid) {
            $products = Product::where('category_id', $catid)->paginate(6);
            return view('product', ['products' => $products]);
        } else {
            $products = Product::paginate(6);
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
