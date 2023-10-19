<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // DataTables::of($products)->make(true);
        return view('admin.pages.product.list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('admin.pages.product.create', ['productCategories' => $productCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Get Original Image Name
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
        }
        if ($request->hasFile('second_image')) {
            $secondFileOrginialName = $request->file('second_image')->getClientOriginalName();
            $secondFileName = pathinfo($secondFileOrginialName, PATHINFO_FILENAME);
            $secondFileName .= '_' . time() . '.' . $request->file('second_image')->getClientOriginalExtension();
            $request->file('second_image')->move(public_path('images'),  $secondFileName);
        }
        $products = Product::create([
            'image' => $request->image = $fileName ?? null,
            'second_image' => $request->second_image = $secondFileName ?? null,
            'name' => $request->name,
            'status' => $request->status,
            'slug' => $request->slug,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'weight' => $request->weight,
            'size' => $request->size,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'product_category_id' => $request->product_category_id,
            'rating_id' => 1,
            'color_id' => 1,
            'created_at' => Carbon::now(+7),
            'updated_at' => Carbon::now(+7)
        ]);
        $message = $products ? 'Create product successfully' : 'Failed to create product';
        return Redirect::route('admin.product.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $productCategories = ProductCategory::all();
        return view('admin.pages.product.detail', ['product' => $product, 'productCategories' => $productCategories]);
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
    public function update(StoreProductRequest $request, Product $product)
    {
        $oldImageFileName = $product->image;
        $oldSecondImageFileName = $product->second_image;
        // dd($oldImageFileName);
        if ($request->hasFile('image')) {
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'),  $fileName);
            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldImageFileName);
            }
        }
        if ($request->hasFile('second_image')) {
            $secondFileOrginialName = $request->file('second_image')->getClientOriginalName();
            $secondFileName = pathinfo($secondFileOrginialName, PATHINFO_FILENAME);
            $secondFileName .= '_' . time() . '.' . $request->file('second_image')->getClientOriginalExtension();
            $request->file('second_image')->move(public_path('images'),  $secondFileName);
            if (!is_null($oldImageFileName) && file_exists('images/' . $oldImageFileName)) {
                unlink('images/' . $oldSecondImageFileName);
            }
        }
        $product->image = $fileName ?? $oldImageFileName;
        $product->second_image = $secondFileName ?? $oldSecondImageFileName;
        $product->name = $request->name;
        $product->status = $request->status;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->weight = $request->weight;
        $product->size = $request->size;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->product_category_id = $request->product_category_id;
        $product->rating_id = 1;
        $product->color_id = 1;
        $product->updated_at = Carbon::now(+7);
        $check = $product->save();
        $message = $check ? 'Successfully created product' : 'Failed to create product';
        return Redirect::route('admin.product.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $check = $product->delete();
        $message = $check ? 'Delete product successfully' : ' Failed to delete product';
        return Redirect::route('admin.product.index')->with('message', $message);
    }
    public function createSlug(Request $request)
    {
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }
}
