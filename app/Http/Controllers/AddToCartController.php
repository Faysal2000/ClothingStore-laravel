<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AddToCartController extends Controller
{
    // إضافة منتج إلى السلة
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى السلة!');
    }

    // عرض المنتجات في السلة
    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('Product.addproduct', compact('cart'));
    }

    // إزالة منتج من السلة
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'تمت إزالة المنتج من السلة!');
    }


    public function show()
    {
        $products = Product::all(); // أو حسب الطريقة التي تجلب بها المنتجات

        return view('cart.index', compact('products'));
    }
}
