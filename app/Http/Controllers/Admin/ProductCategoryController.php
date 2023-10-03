<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('admin.pages.product-category.list', ['productCategories' => $productCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productCategories = new ProductCategory;
        $productCategories->name = $request->name;
        $productCategories->status = $request->status;
        $productCategories->save();
        $message = $productCategories ? 'Created product category successfully' : 'Failed to create product category';
        return redirect()->route('admin.product-category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $product_category)
    {
        return view('admin.pages.product-category.detail',['product_category' => $product_category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
