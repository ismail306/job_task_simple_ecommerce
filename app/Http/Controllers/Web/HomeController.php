<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        return view('web.home', compact('categories'));
    }
    public function getProductsBySCat($name, $id)
    {

        $catOrSCatProducts = SubCategory::with('product')->where('id', $id)->where('status', 1)->first();

        return view('web.products', compact('catOrSCatProducts'));
    }

    public function getProductsByCat($name, $id)
    {
        $catOrSCatProducts = Category::with('product')->where('id', $id)->where('status', 1)->first();

        return view('web.products', compact('catOrSCatProducts'));
    }

    public function getProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->where('status', 1)->first();

        return view('web.product-details', compact('product'));
    }
}
