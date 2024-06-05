<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\item;
use App\Models\category;
use DB;
use Illuminate\Support\Facades\Storage;
use Str;

class AdminController extends Controller
{
    //
    public function index()
    {   
       
        return view('admin');
    }

    public function record(){
        $items =  item::all();
        return view('admin',compact('items'));
    }
    
    
    public function items(){
        return view('add_item');
    }

    public function additems(Request $request){
        $add = new Item;

        $add->title = $request->title;
        $add->description= $request->description;
        $add->category_id=$request->category_id;
        $add->price= $request->price;
        $add->slug = Str::slug($request->title);
        $add->status=$request->status;
        //Image
        $path = public_path() . '/storage/user/';
        $folderPath = 'public/user/';
        if (!file_exists($path)) {
            Storage::makeDirectory($folderPath, 0755);
            chmod($path, 0755);
        }
 $array_val=[];
    if ($request->hasFile('image')) {
       
        foreach ($request->image as $f){
        $extension = $f->getClientOriginalExtension(); // getting image extension
        $filename = rand(1111111111,999999999) . '.' . $extension;
        Storage::putFileAs($folderPath, $f, $filename);
        array_push($array_val,$filename);
        }
       
        $add -> image=json_encode($array_val);        
    } 

    $add->save();
    return redirect()->back()->with('status', 'Data Added Successfully');
}


 public function category(){
    $categories = category::pluck('title', 'id');
    return view('add_item',compact('categories' ));

    }

    public function delete(Request $request, $id){
        $item = Item::find($id);
    
        // Validate that the item exists
        if (!$item) {
            return redirect()->route('admin')->with('error', 'Item not found.');
        }
    
        $item->delete();
        return redirect()->route('admin')->with('success', 'Item deleted successfully.');
    }

    public function updateform(Request $request, $id)
{
    $item = Item::find($id);
    
    $categories = Category::pluck('title', 'id');
    
    return view('edit_item', compact('id', 'categories', 'item'));
}

    public function update(Request $request, $id){
        
        $item = Item::findOrFail($id);
      
        $item->title = $request->title;
        $item->description = $request->description;
        $item->category_id = $request->category_id;
        $item->price = $request->price;
        $item->slug = Str::slug($request->title);
        $item->status = $request->status;
        
        $item->updated_at= now();
       


        // Image handling
        $path = public_path() . '/storage/user/';
        $folderPath = 'public/user/';
        if (!file_exists($path)) {
            Storage::makeDirectory($folderPath, 0755);
            chmod($path, 0755);
        }

        $array_val = [];
        if ($request->hasFile('image')) {
            // Delete old images if they exist
            if (!empty($item->image)) {
                $old_images = json_decode($item->image);
                foreach ($old_images as $old_image) {
                    Storage::delete($folderPath . $old_image);
                }
            }

            foreach ($request->image as $f) {
                $extension = $f->getClientOriginalExtension(); // getting image extension
                $filename = rand(1111111111, 9999999999) . '.' . $extension;
                Storage::putFileAs($folderPath, $f, $filename);
                array_push($array_val, $filename);
            }

            $item->image = json_encode($array_val);
        }

        // Save the updated item
        $item->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Item Updated Successfully');
    }


}