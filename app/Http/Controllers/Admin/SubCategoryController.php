<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use App\Traits\CommonHelperTrait;

class SubCategoryController extends Controller
{
    use CommonHelperTrait;
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

    public function store(SubCategoryStoreRequest $request)
    {


        $path = 'storage/images/sub-category-images';
        $filename = $this->storeImage($path, $request->file('image'));

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

    public function update(SubCategoryUpdateRequest $request, $subcategory)
    {

        $sub_category = SubCategory::find($subcategory);

        if ($request->hasFile('image')) {
            $path = 'storage/images/sub-category-images';
            $filename = $this->updateImage($path, $request->file('image'), $sub_category->image);
            $sub_category->image = $filename;
        }

        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category;
        $sub_category->status = $request->status;
        $sub_category->save();
        //redirect with success message

        return redirect()->route('sub-categories.index')->with('success', 'Sub Category updated successfully');
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
