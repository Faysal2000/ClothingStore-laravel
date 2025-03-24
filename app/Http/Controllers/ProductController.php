<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // عرض جميع المنتجات
    public function index()
    {
        $products = Product::all();
        return view('Products.index', compact('products'));
    }

    // عرض صفحة إضافة منتج جديد
    public function create()
    {


        $allcategories = Category::all();
        return view('Products.addproduct', compact('allcategories'));
    }

    //  إنشاء منتج جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'imagepath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // رفع الصورة إن وجدت
        $path = $request->hasFile('imagepath') ? $request->file('imagepath')->store('uploads', 'public') : null;

        // إنشاء المنتج باستخدام Eloquent
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'imagepath' => $path, // تخزين مسار الصورة
        ]);

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }


    // عرض منتج معين
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('Products.show', compact('product'));
    }

    // عرض صفحة تعديل المنتج
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $allcategories = Category::all();
        return view('Products.editproduct', compact('product', 'allcategories'));
    }

    // تحديث بيانات المنتج
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'imagepath' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($id);

        // تحديث بيانات المنتج
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'imagepath' => $request->hasFile('photo') ? $request->file('photo')->store('uploads', 'public') : $product->imagepath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // حذف المنتج
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
