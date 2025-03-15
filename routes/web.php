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




Route::get('/addproduct', [ProductController::class, 'Addproduct']);
Route::get('/removeproduct/{productid?}', [ProductController::class, 'RemoveProducts']);
Route::get('/editproduct/{productid?}', [ProductController::class, 'EditProduct']);

Route::post('/storeproduct', [ProductController::class, 'StoreProduct']);





Route::get('/reviews', [FirstController::class, 'reviews']);
//Route::get('/contact}', [ContactController::class, 'store'])->name('contact.store');
