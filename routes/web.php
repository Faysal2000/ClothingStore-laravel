<?php

use App\Http\Controllers\ContectController;
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


Route::post('/storeproduct', [ProductController::class, 'StoreProduct']);
