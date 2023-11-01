<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        $cart = session()->get('cart') ?? [];
        $imagesLink = is_null($product->image) || !file_exists('images/' . $product->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/' . $product->image);
        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
            'discount_price' => $product->discount_price,
            'image' => $imagesLink,
            'qty' => ($cart[$productId]['qty'] ?? 0) + 1
        ];
        session()->put('cart', $cart);
        $total_price = $this->calculateTotalPrice($cart);
        $total_items = count($cart);
        $total_qty = array_sum(array_column($cart, 'qty'));

        $notification = [
            'message' => 'Add product successfully!',
            'product_image' => $product->image,
            'product_discount_price' => $product->discount_price,
            'product_price' => $product->price,
            'product_name' => $product->name,
            'product_qty' => $cart[$productId]['qty'],
            'total_price' => $total_price,
            'total_items' => $total_items,
            'total_qty' => $total_qty,
        ];
        return response()->json($notification);
    }
    public function calculateTotalPrice($cart): float
    {
        $total = 0;
            foreach ($cart as $item) {
                $total += ($item['discount_price'] > 0 ? $item['discount_price'] : $item['price']) * $item['qty'];
            }
            // $total += $item['price'] * $item['qty'];
        return $total;
    }
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        // dd($carts);
        return view('client.pages.cart', ['cart' => $cart]);
    }
    public function deleteItem($productId)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        $notification = [
            'message' => 'Delete item success',
        ];
        return response()->json($notification);
    }

    public function updateItem($productId, $qty)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['qty'] = $qty;
            if (!$qty) {
                unset($cart[$productId]);
            }
            session()->put('cart', $cart);
        }
        $total_price = $this->calculateTotalPrice($cart);
        $total_items = count($cart);
        $total_qty = 0;

        foreach ($cart as $item) {
            $total_qty += $item['qty'];
        }

        return response()->json([
            'message' => 'Update item success',
            'total_price' => $total_price,
            'total_items' => $total_items,
            'total_qty' => $total_qty,
        ]);
    }
    public function emptyCart()
    {
        session()->put('cart', []);
        return response()->json([
            'message' => 'Cart delete success',
            'total_price' => 0,
            'total_items' => 0,
        ]);
    }
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('client.pages.checkout', ['cart' => $cart]);
    }
}
