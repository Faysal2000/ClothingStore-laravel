<?php

use App\Http\Controllers\ContactController;

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;






Route::get('/', [FirstController::class, 'MainPage']);

Route::get('/products/{catid?}', [FirstController::class, 'GetCategoryProducts']);


Route::get('/category', [FirstController::class, 'GetAllCategoryWithProducts']);



//اضافة منتج
Route::get('/addproduct', [ProductController::class, 'Addproduct']);

//جذف منتج
Route::get('/removeproduct/{productid?}', [ProductController::class, 'RemoveProducts']);
//تعديل منتج
Route::get('/editproduct/{productid?}', [ProductController::class, 'EditProduct']);
//عرض منتج
Route::post('/storeproduct', [ProductController::class, 'StoreProduct']);




//اراء العملاء
Route::get('/reviews', [FirstController::class, 'reviews']);
Route::post('/storeReview', [FirstController::class, 'storeReview']);



//جلب المنتجات في عملية البحث
Route::post('/search', function (Request $request) {
    $products = Product::where('name', 'like', '%' . $request->searchkey . '%')->get();
    return view('product', ['products' => $products]);
});
