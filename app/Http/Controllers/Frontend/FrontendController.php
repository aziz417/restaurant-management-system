<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\Category;

class FrontendController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 'on')->get();
        $categories = Category::all();
        $items = Item::all();
        return view('welcome', compact('sliders', 'categories', 'items'));
    }
}
