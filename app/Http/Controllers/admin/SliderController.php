<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:sliders',
            'image' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        if($request->hasFile('image')){
            $fileName = $request->image->getClientOriginalName();
            $request['avatar'] = $fileName;
            $request->image->storeAs('images', $fileName, 'public');
            $slider = Slider::create($request->all());
        }
        return redirect()->route('sliders.index');
        
    }

    public function show($id)
    {
        //
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
            $fileName = $request->image->getClientOriginalName();
            $request['avatar'] = $fileName;
            $request->image->storeAs('images', $fileName, 'public');
            $slider->update($request->all());

            return redirect()->route('sliders.index');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->back();
    }
}
