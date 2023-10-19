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
        $bestSellerProductCategory = ProductCategory::where('name', 'bestseller')->first();
        $saleProductCategory = ProductCategory::where('name', 'special')->first();
        //Relational in Model Product
        if ($featuredProductCategory) {
            $featuredProducts = Product::with('product_category')->where('product_category_id', $featuredProductCategory->id)->get();
        }

        if ($latestProductCategory) {
            $latestProducts = Product::with('product_category')->where('product_category_id', $latestProductCategory->id)->get();
        }

        if ($bestSellerProductCategory) {
            $bestSellerProducts = Product::with('product_category')->where('product_category_id', $bestSellerProductCategory->id)->get();
        }
        if ($saleProductCategory) {
            $saleProducts = Product::with('product_category')->where('product_category_id', $saleProductCategory->id)->get();
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
                'bestSellerProductCategory' => $bestSellerProductCategory,
                'saleProductCategory' => $saleProductCategory,
                'featuredProducts' => $featuredProducts,
                'latestProducts' => $latestProducts,
                'bestSellerProducts' => $bestSellerProducts,
                'saleProducts' => $saleProducts,
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
