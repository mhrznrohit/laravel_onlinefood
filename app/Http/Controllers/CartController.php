<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;
use App\Http\Requests;


class CartController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart(){
        return view("cart");
    }

    public function addTOCart(Request $request){
        $itemId=$request->input('item_id');
        $item=item::find($itemId);

        $cart = session()->get('cart', []);
        $cart[$itemId] = [
            'title' => $item->title,
            'price' => $item->price,
        ];
        session()->put('cart', $cart);

        return redirect()->route('view')->with('success', 'Product added to cart successfully!');

    }
    
}
