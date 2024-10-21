<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //image store
        $originalname = $request->file('image')->getClientOriginalName();
        $filename =  date('Y-m-d') . '_' . time() . $originalname;
        $image = $request->file('image');
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(512, 512);
        // Define the storage path
        $path = public_path('storage/images/category-images');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $image_resize->save($path . '/' . $filename);

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

    public function update(Request $request, $category)
    {


        $categories = Category::find($category);
        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $oldImagePath = public_path('storage/images/category-images/' . $categories->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }

            $originalname = $request->file('image')->getClientOriginalName();
            $filename =  date('Y-m-d') . '_' . time() . $originalname;
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(512, 512);
            $image_resize->save(public_path('storage/images/category-images/' . $filename));
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
