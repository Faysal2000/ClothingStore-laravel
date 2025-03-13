<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function Addproduct()
    {
        $allcategories = Category::all();
        return view('Products.addproduct', ['allcategories' => $allcategories]);
    }




    public function StoreProduct(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);




        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->price = $request->price;
        $newProduct->quantity = $request->quantity;
        $newProduct->imagepath = $request->imagepath;
        $newProduct->descrition = $request->description;
        $newProduct->category_id = $request->category_id;

        $newProduct->save();

        return redirect('/');
    }



    public function EditProduct($productid)
    {

        $allcategories = Category::all();
        $currantProduct = Product::find($productid);

        return View('/Products.editproduct', ["product" => $currantProduct, 'allcategories' => $allcategories]);
    }




    public function RemoveProducts($productid = null)
    {
        if ($productid != null) {
            $currantProduct = Product::find($productid);
            $currantProduct->delete();
            return redirect('/products');
        } else {
            abort(403, 'enter product id');
        }
    }
}
