<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use App\Http\Requests;


class CartController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function cart(){
        return view("cart");
    }

    public function addTOCart(Request $request)
{
    $itemId = $request->input('item_id');
    $quantity = $request->input('quantity', 1);
    $item = Item::find($itemId);

    if (!$item) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    $cart = session()->get('cart', []);
  

    if (isset($cart[$itemId])) {
        // Ensure the 'quantity' key exists before incrementing
        $cart[$itemId]['quantity'] = isset($cart[$itemId]['quantity']) ? $cart[$itemId]['quantity'] : 1;
        $cart[$itemId]['quantity'] += $quantity;
    } else {
        // Add new item to the cart
        $cart[$itemId] = [
            'title' => $item->title,
            'price' => $item->price,
            'quantity' => $quantity,
        ];
    }

    session()->put('cart', $cart);

    // Calculate the total quantity
    $totalQuantity = 0;
    foreach ($cart as $item) {
        $itemQuantity = isset($item['quantity']) ? $item['quantity'] : 0;
        $totalQuantity += $itemQuantity;
    }

    return redirect()->route('view')->with('success', 'Product added to cart successfully!');
}
}