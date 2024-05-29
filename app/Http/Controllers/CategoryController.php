<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\item;
use App\Models\Category;


class CategoryController extends Controller
{
    //

    public function showcategory($slug)
{
  
    $category = Category::where('slug', $slug)->firstOrFail();
    return view('category', compact('category'));
}


}
