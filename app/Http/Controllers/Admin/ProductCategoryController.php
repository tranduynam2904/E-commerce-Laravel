<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

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
        $productCategories = ProductCategory::create([
            'name' => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ]);
        $message = $productCategories ? 'Created product category successfully' : 'Failed to create product category';
        return Redirect::route('admin.product-category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $product_category)
    {
        return view('admin.pages.product-category.detail', ['product_category' => $product_category]);
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
    public function update(Request $request, ProductCategory $productCategory)
    {
        $productCategory->name = $request->name;
        $productCategory->status = $request->status;
        $productCategory->updated_at = Carbon::now(+7);
        $check = $productCategory->save();
        $message = $check ? 'Updated product category successfully' : 'Failed to update product category';
        return Redirect::route('admin.product-category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $check = $productCategory->delete();
        $message = $check ? 'Deleted product category successfully' : 'failed to delete product category';
        return Redirect::route('admin.product-category.index')->with('message', $message);
    }
}
