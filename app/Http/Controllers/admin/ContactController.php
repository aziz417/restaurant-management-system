<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function index(Contact $contact){
        $contacts = $contact->all();
        return view('admin.contact.contact', compact('contacts'));
    }

    public function destroy($id){
        Contact::find($id)->delete();
        Toastr::success('Contact delete successfully',
         'Success', ["positionClass" => "toast-top-right"]);
         return redirect()->back();
    }
}
