<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeProductCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class HomeProductCategoryController extends Controller
{
    public function index()
    {
        $homeProductCategories = HomeProductCategory::all();
        $productCategories = ProductCategory::all();
        return view('admin.pages.product-category-client.detail', [
            'productCategories' => $productCategories,
            'homeProductCategories' => $homeProductCategories
        ]);
    }
    public function store(Request $request, HomeProductCategory $home_product_category)
    {
        // If duplicate return redirect
        if (HomeProductCategory::where('name',$request->name)->first()) {
            return Redirect::route('admin.home-product-category.index')->with('message', 'Already have this product category');
        }
        $homeProductCategory = HomeProductCategory::create([
            'name' => $request->name,
        ]);
        $message = $homeProductCategory ? 'Add product category to home successfully' : 'Failed to add product category to home';
        return Redirect::route('admin.home-product-category.index')->with('message', $message);
    }
    public function delete(HomeProductCategory $home_product_category)
    {
        $home_product_category->delete();
        $message = $home_product_category ? 'Delete home product category successfully' : 'Failed to delete home product category';
        return Redirect::route('admin.home-product-category.index')->with('message', $message);
    }
}
