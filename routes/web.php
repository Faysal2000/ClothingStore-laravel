<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

Auth::routes(['register' => true]);

// الصفحة الرئيسية  
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [CategoryController::class, 'MainPage']);

// عرض المنتجات حسب الفئة
Route::get('/products/{catid?}', [CategoryController::class, 'GetCategoryProducts'])->name('prods');

// عرض جميع الفئات مع المنتجات
Route::get('/category', [CategoryController::class, 'GetAllCategoryWithProducts'])->name('cats');

// تعريف جميع الـ CRUD للمنتجات باستخدام Resource Controller
Route::resource('products', ProductController::class);

// إدارة آراء العملاء
Route::get('/reviews', [CategoryController::class, 'reviews'])->name('reviews.index');
Route::post('/storeReview', [CategoryController::class, 'storeReview'])->name('reviews.store');

// البحث عن المنتجات
Route::post('/search', function (Request $request) {
    $products = Product::where('name', 'like', '%' . $request->searchkey . '%')->get()->paginate(6);
    return view('product', compact('products'));
})->name('search');




Route::get('/Products.ProductsTables', [ProductController::class, 'productsTable']);

Route::get('/admin', [CategoryController::class, 'GetCategoryProducts']);





Route::get('/admin/login', function () {
    return "admin panel";
});


Route::get('/admin/index', function () {
    return "admin panel";
})->middleware('checkrole:admin');


Route::get('/admin/chart', function () {
    return "admin charts";
})->middleware('checkrole:admin,salesman');


Route::get('/admin/bills', function () {
    return "admin bills";
})->middleware('checkrole:salesman');
