<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProductCategory = ProductCategory::where('name', 'featured')->first();
        // dd($featuredProductCategory);
        $latestProductCategory = ProductCategory::where('name', 'latest')->first();
        $bestsellerProductCategory = ProductCategory::where('name', 'bestseller')->first();
        //Relational in Model Product
        if ($featuredProductCategory) {
            $featuredProducts = Product::with('product_category')->where('product_category_id', $featuredProductCategory->id)->get();
        }

        if ($latestProductCategory) {
            $latestProducts = Product::with('product_category')->where('product_category_id', $latestProductCategory->id)->get();
        }

        if ($bestsellerProductCategory) {
            $bestsellerProducts = Product::with('product_category')->where('product_category_id', $bestsellerProductCategory->id)->get();
        }
        // foreach ($featuredProduct as $product) {
        //     $featuredProduct = $product->category->name;
        //     // Sử dụng $categoryName theo nhu cầu của bạn
        //     dd($featuredProduct);
        // }
        return view(
            'client.pages.main.main',
            [
                'featuredProductCategory' => $featuredProductCategory,
                'latestProductCategory' => $latestProductCategory,
                'bestsellerProductCategory' => $bestsellerProductCategory,
                'featuredProducts' => $featuredProducts,
                'latestProducts' => $latestProducts,
                'bestsellerProducts' => $bestsellerProducts,
            ]
        );
    }

    // public function getProducts(ProductCategory $productCategory)
    // {
    //     if ($productCategory->ajax())
    //     $products = Product::where('product_category_id', $productCategory->id)->get();
    //     return view('client.pages.main.components.products', ['products' => $products]);
    // }
}
