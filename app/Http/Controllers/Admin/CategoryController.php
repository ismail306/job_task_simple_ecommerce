<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Traits\CommonHelperTrait;

class CategoryController extends Controller
{
    use CommonHelperTrait;
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {

        $path = 'storage/images/category-images';
        $filename = $this->storeImage($path, $request->file('image'));


        $categories = new Category();
        $categories->name = $request->name;
        $categories->image = $filename;
        $categories->description = $request->description;
        $categories->status = $request->status;


        $categories->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function show(Category $categorie)
    {
        //

    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $category)
    {

        $categories = Category::find($category);

        if ($request->hasFile('image')) {
            $path = 'storage/images/category-images';
            $filename = $this->updateImage($path, $request->file('image'), $categories->image);
            $categories->image = $filename;
        }

        $categories->name = $request->name;
        $categories->status = $request->status;
        $categories->description = $request->description;
        $categories->save();
        //redirect with success message

        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
