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
       
        $vrProductCategory = ProductCategory::where('name','vr')->first();
        $laptopProductCategory = ProductCategory::where('name','laptop')->first();
        $tvProductCategory = ProductCategory::where('name','tv')->first();
        $featuredProductCategory = ProductCategory::where('name', 'Featured Products')->first();
        // dd($featuredProductCategory);
        $newArrivalProductCategory = ProductCategory::where('name', 'New Arrival')->first();
        $bestSellerProductCategory = ProductCategory::where('name', 'Bestseller')->first();
        // $saleProductCategory = ProductCategory::where('name', 'special')->first();
        //Relational in Model Product
        $featuredProducts = $newArrivalProducts = $bestSellerProducts = $vrProducts = collect();
        if ($featuredProductCategory) {
            $featuredProducts = Product::with('product_category')->where('product_category_id', $featuredProductCategory->id)->get();
        }

        if ($newArrivalProductCategory) {
            $newArrivalProducts = Product::with('product_category')->where('product_category_id', $newArrivalProductCategory->id)->get();
        }

        if ($bestSellerProductCategory) {
            $bestSellerProducts = Product::with('product_category')->where('product_category_id', $bestSellerProductCategory->id)->get();
        }
        if($vrProductCategory){
            $vrProducts = Product::with('product_category')->where('product_category_id',$vrProductCategory->id)->get();
        }
        // if ($saleProductCategory) {
        //     $saleProducts = Product::with('product_category')->where('product_category_id', $saleProductCategory->id)->get();
        // }
        // foreach ($featuredProduct as $product) {
        //     $featuredProduct = $product->category->name;
        //     // Sử dụng $categoryName theo nhu cầu của bạn
        //     dd($featuredProduct);
        // }
        return view(
            'client.pages.main.main',
            [
                'featuredProductCategory' => $featuredProductCategory,
                'newArrivalProductCategory' => $newArrivalProductCategory,
                'bestSellerProductCategory' => $bestSellerProductCategory,
                // 'saleProductCategory' => $saleProductCategory,
                'featuredProducts' => $featuredProducts,
                'newArrivalProducts' => $newArrivalProducts,
                'bestSellerProducts' => $bestSellerProducts,
                // 'saleProducts' => $saleProducts,
                'vrProductCategory' => $vrProductCategory,
                'vrProducts' => $vrProducts,
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
