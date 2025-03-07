<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $result = DB::table('categories')->get();

    return view('welcome', ['categories' => $result]);
});

Route::get('/product/{catid}', function ($catid) {
    $result = DB::table('products')->where('category_id', $catid)->get();

    return view('product', ['products' => $result]);
});



Route::get('/category', function () {
    return view('category');
});
