<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:sliders',
            'image' => 'required|mimes,jpeg,png',
        ]);

        if($request->hasFile('image')){
            $fileName = 
        }
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
