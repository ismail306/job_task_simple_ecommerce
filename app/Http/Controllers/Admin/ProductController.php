<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Traits\CommonHelperTrait;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use CommonHelperTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get products with images and category
        $products = Product::with('subCategory', 'category')->orderBy('created_at', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        $path = 'storage/images/product-images';
        $filename = $this->storeImage($path, $request->file('image'));

        $product = new Product();

        $product->slug = Str::slug($request->title) . '_' . time();
        $product->title = $request->title;
        $product->image = $filename;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->subcategory;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //dd products category id
        $categories = Category::where('status', 1)->get();
        $subcategories = SubCategory::where('category_id', $product->category_id)->get();
        return view('admin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {


        if ($request->hasFile('image')) {
            $path = 'storage/images/product-images';
            $filename = $this->updateImage($path, $request->file('image'), $product->image);
            $product->image = $filename;
        }

        $product->title = $request->title;
        $product->slug = Str::slug($request->title) . '_' . time();
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->sub_category_id = $request->subcategory;
        $product->category_id = $request->category;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }


    public function productDetails(Product $product)
    {

        return view('users.details', compact('product'));
    }

    public function searchProducts(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'LIKE', "%{$search}%")->get();
        return view('users.products', compact('products'));
    }
}
