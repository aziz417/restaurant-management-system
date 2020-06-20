<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\ComonController;
use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\Category;


class ItemController extends Controller
{
      //file handeling work here
      public $folderName = 'Item';
      public $fileHandler;
      function __construct()
      {
          $this->fileHandler = new ComonController();
      }
  
    public function index()
    {
        $items = Item::with('Category')->get();        
        return view('admin.item.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::All();
        return view('admin.item.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:555',
            'price' => 'required',
            'img' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $image = $request->file('img');

       if(isset($image)){

           //image upload and validation here
           $validImage = $this->fileHandler->fileUploadedBackend($image, $this->folderName, 'img');       

        if (isset($validImage) != false ){
            $request['image'] = $validImage;
        }

       }

        Item::create($request->all());
        return redirect()->route('items.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Item $item)
    {
        $categories = Category::All();

        return view('admin.item.edit', compact('categories', 'item'));
    }

    public function update(Item $item, Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:555',
            'price' => 'required',
            'img' => 'required|mimes:jpg,jpeg,bmp,png',
        ]);

        $image = $request->file('img');

       if(isset($image)){

           //image upload and validation here
           $validImage = $this->fileHandler->fileUploadedBackend($image, $this->folderName, 'img');       

            if (isset($validImage) != false ){

                $this->fileHandler->imageDeleteBackend($request->oldImage, $this->folderName);
                $request['image'] = $validImage;
                
            }

       }

        $item->update($request->all());
        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $validImage = $this->fileHandler->imageDeleteBackend($item->image, $this->folderName);
        
        $item->delete();
        return redirect()->back();
    }
}
