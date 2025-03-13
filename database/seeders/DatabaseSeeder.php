<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $categories = [

            ['id' => 1, 'name' => 'MAN', 'description' => 'man clothes', 'imagepath' => 'assets/img/man/a   .jpg'],
            ['id' => 2, 'name' => 'WOMEN', 'description' => 'women clothes', 'imagepath' => 'assets/img/man/a2.jpg'],
            ['id' => 3, 'name' => 'BABY', 'description' => 'baby clothes', 'imagepath' => 'assets/img/man/b1.jpg'],
            ['id' => 4, 'name' => 'SHOES', 'description' => 'shoes', 'imagepath' => 'assets/img/man/c1.jpg'],
            ['id' => 5, 'name' => 'PERFUM', 'description' => 'perfum', 'imagepath' => 'assets/img/man/d1.jpg'],
        ];


        /*$products = [
            ['T-Shirt', 25.99, 'Comfortable cotton t-shirt', 50, 'assets/img/1.jpg'],
            ['Jeans', 49.99, 'Slim fit blue jeans', 30, 'images/jeans.jpg'],
            ['Dress', 79.99, 'Elegant evening dress', 20, 'images/dress.jpg'],
            ['Jacket', 99.99, 'Warm winter jacket', 15, 'images/jacket.jpg'],
            ['Sneakers', 59.99, 'Comfortable running sneakers', 25, 'images/sneakers.jpg'],
            ['Cap', 15.99, 'Adjustable baseball cap', 40, 'images/cap.jpg'],
            ['Sweater', 45.99, 'Soft wool sweater', 35, 'images/sweater.jpg'],
            ['Scarf', 19.99, 'Warm winter scarf', 50, 'images/scarf.jpg'],
            ['Handbag', 89.99, 'Luxury leather handbag', 12, 'images/handbag.jpg'],
            ['Boots', 120.99, 'Leather ankle boots', 18, 'images/boots.jpg'],
        ];*/







        DB::table('categories')->insertOrIgnore($categories);


        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => 'Product' . $i,
                'price' => rand(10, 100),
                'description' => 'This is product number' . $i,
                'price' => rand(10, 200),
                'quantity' => rand(10, 50),
                'category_id' => rand(1, 5),
                'imagepath' => ''
            ]);
        }
    }
}
