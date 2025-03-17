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
            'imagepath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);


        // حفظ القيم الجديدة بعد التعديل
        if ($request->id) {
            $currantProduct = Product::find($request->id);
            $currantProduct->name = $request->name;
            $currantProduct->price = $request->price;
            $currantProduct->quantity = $request->quantity;
            $currantProduct->description = $request->description;
            $currantProduct->imagepath = $request->imagepath;
            $currantProduct->category_id = $request->category_id;

            $currantProduct->save();
            return redirect('/products');
        } else {



            //اضافة منتج جديد
            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->quantity = $request->quantity;
            $newProduct->descrition = $request->description;
            $newProduct->category_id = $request->category_id;





            //تحميل الصور الى المجلد في المسار المحدد
            $path =   $request->photo->move('uploads', string::uuid()->toString() . '-' . $request->photo->getClientOriginalName());


            $newProduct->imagepath  = $path;


            $newProduct->save();

            return redirect('/products');
        }
    }


    public function EditProduct($productid = null)
    {

        if ($productid != null) {

            $currantProduct = Product::find($productid);
            if ($currantProduct == null) {
                abort("403", "Cant Find This Product");
            }
            $allcategories = Category::all();


            return View('Products.editproduct', ["product" => $currantProduct, 'allcategories' => $allcategories]);
        } else {
            return redirect('/addproduct');
        }
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
