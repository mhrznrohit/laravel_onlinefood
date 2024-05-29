<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    //
    public function index(){
        return view('contact_form');
    }

    public function contactmail(Request $request){
        $name=$request->input('name');
        $email=$request->input('email');
       
        $address=$request->input('address');
        $description=$request->input('description');

     Mail::to($email)->send(new contact($name, $email,$address,$description));
    return back()->with('sucess','Email Sent Sucessfully');
    }
}
