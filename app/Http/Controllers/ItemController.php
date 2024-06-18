<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function viewitems(){


        $items =  item::with('category')->where('status',1)->get();
        $categories =  category::with('items')->get();


          return view('home',compact('items'));
        //return response()->json($items);
}

public function showitem($slug)
{
    $item = item::where('slug', $slug)->firstOrFail();
    return view('item_detail', compact('item'));
}


public function search(Request $request){
    $search = $request->input('search');
    $results = item::where('title', 'like', "%$search%")->get();
return view("search_item",['results' => $results]);

}

public function searchitem()
{

    return view('search_items');
}
}
