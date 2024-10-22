<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Admin\Category;
use App\Traits\CommonHelperTrait;

class CategoryRepository implements CategoryInterface
{
    use CommonHelperTrait;

    public function all()
    {
        return Category::all();
    }

    public function store($data)
    {
        //dd($data);
        $path = 'storage/images/category-images';
        $filename = $this->storeImage($path, $data['image']);


        $categories = new Category();
        $categories->name = $data['name'];
        $categories->image = $filename;
        $categories->description = $data['description'];
        $categories->status = $data['status'];


        $categories->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function update($data, $categoryId)
    {

        $category = Category::findOrFail($categoryId);

        if (isset($data['image']) && $data['image']) {
            $path = 'storage/images/category-images';
            $filename = $this->updateImage($path, $data['image'], $category->image);
            $category->image = $filename;
        }



        $category->name = $data['name'];
        $category->status = $data['status'];
        $category->description = $data['description'];
        $category->save();

        return $category;
    }
}
