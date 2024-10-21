<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
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
    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'required|max:4',
            'discount' => 'required',

        ]);



        $product = new Product();

        $product->slug = Str::slug($request->name) . '_' . time();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->category_id = $request->category_id;
        $product->save();

        foreach ($request->file('images') as $image) {

            //image store
            $originalname = $image->getClientOriginalName();
            $filename =  date('Y-m-d') . '_' . time() . $originalname;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500);
            $image_resize->save(public_path('storage/images/products_images/' . $filename));
            $image = new Images();
            $image->product_id = $product->id;
            $image->url = $filename;
            $image->save();
        }


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
        $categoryList = Category::where('status', 1)->pluck('title', 'id');


        return view('admin.products.edit', compact('product', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images' => 'max:4',
            'discount' => 'required',

        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                //image store
                $originalname = $image->getClientOriginalName();
                $filename =  date('Y-m-d') . '_' . time() . $originalname;
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(500, 500);
                $image_resize->save(public_path('storage/images/products_images/' . $filename));
                $image = new Images();
                $image->product_id = $product->id;
                $image->url = $filename;
                $image->save();
            }
        }
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
