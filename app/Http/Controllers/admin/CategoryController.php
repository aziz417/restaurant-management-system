<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = category::all();

        return view('admin.category.index', compact('categorys'));
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $request['slug']  = Str::slug($request->name);
        category::create($request->all());
        return redirect()->route('categorys.index');
        
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $request['slug']  = Str::slug($request->name);
        $category->update($request->all());
        return redirect()->route('categorys.index'); 
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
