<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
{

    $request->validate([
        'products' => 'required|array',
        'products.*.product_id' => 'required|exists:products,id',
        'products.*.quantity' => 'required|integer|min:1',
    ]);

    $products = $request->input('products');

    if (!is_array($products)) {
        return response()->json([
            'status' => 'error',
            'message' => 'No products provided for the order',
        ], 400);
    }

    $order = Order::create([
        'user_id' => auth()->id(),
        'total_price' => 0,
    ]);

    $totalPrice = 0;

    foreach ($products as $productData) {

        $product = Product::findOrFail($productData['product_id']);

        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $productData['quantity'],
            'price' => $product->price * $productData['quantity'],
        ]);


        $totalPrice += $product->price * $productData['quantity'];
    }

    $order->update(['total_price' => $totalPrice]);

    return response()->json([
        'status' => 'success',
        'message' => 'Order created successfully',
        'order' => $order,
    ], 201);
}

}
