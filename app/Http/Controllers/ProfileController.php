<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index(){
        $user = auth()->user();
        return view("profile",compact("user"));
    }

    public function profile($id){
        $user= User::find($id); 

        if (!$user) {
            // If the profile doesn't exist, redirect to a default profile or another page
            return redirect('/profile');
        }
        if($user->id !== auth()->id()){
            return redirect('/profile');
        }

        return view("profile",compact("user"));

    }

    public function delete(Request $request, $id){
     $user= User::find($id);

     $user->delete();
     return redirect()->back()->with("success","Account Deleted");
    }

}
