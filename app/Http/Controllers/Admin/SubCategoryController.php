<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::all();
        return view('admin.sub-categories.index', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        //image store
        $originalname = $request->file('image')->getClientOriginalName();
        $filename =  date('Y-m-d') . '_' . time() . $originalname;
        $image = $request->file('image');
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(512, 512);
        // Define the storage path
        $path = public_path('storage/images/sub-category-images');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $image_resize->save($path . '/' . $filename);

        $sub_category = new SubCategory();
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category;
        $sub_category->image = $filename;
        $sub_category->status = $request->status;


        $sub_category->save();

        return redirect()->route('sub-categories.index')->with('success', 'Sub Category created successfully');
    }

    public function show(SubCategory $categorie)
    {
        //

    }

    public function edit(SubCategory $sub_category)
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.sub-categories.edit', compact('sub_category', 'categories'));
    }

    public function update(Request $request, $category)
    {


        $sub_category = SubCategory::find($category);
        if ($request->file('image')) {
            $request->validate([

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $oldImagePath = public_path('storage/images/sub-category-images/' . $sub_category->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image
            }

            $originalname = $request->file('image')->getClientOriginalName();
            $filename =  date('Y-m-d') . '_' . time() . $originalname;
            $image = $request->file('image');
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(512, 512);
            $image_resize->save(public_path('storage/images/sub-category-images/' . $filename));
            $sub_category->image = $filename;
        }

        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category;
        $sub_category->status = $request->status;
        $sub_category->save();
        //redirect with success message

        return redirect()->route('sub-categories.index')->with('success', 'SubCategory updated successfully');
    }


    public function destroy(SubCategory $sub_category)
    {
        try {
            $sub_category->delete();

            return redirect()->route('sub-categories.index')->with('success', 'SubCategory deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Error deleting SubCategory: ' . $e->getMessage());

            return redirect()->route('sub-categories.index')->with('error', 'An error occurred while deleting the subcategory.');
        }
    }
    public function subCatByCat($catId)
    {
        $subcategories = SubCategory::where('category_id', $catId)->where('status', 1)->get();
        return response()->json(['subcategories' => $subcategories]);
    }
}
