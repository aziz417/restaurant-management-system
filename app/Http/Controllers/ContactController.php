<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Contact;

class ContactController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());
        
        Toastr::success('Your contact will be sent successfully',
         'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
