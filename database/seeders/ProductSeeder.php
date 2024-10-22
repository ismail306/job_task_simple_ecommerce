<?php

namespace Database\Seeders;

use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Fetch all subcategories
        $subcategories = SubCategory::all();

        // Function to generate a Lorem Ipsum description of 150 characters
        $this->generateProducts($subcategories);
    }

    private function generateProducts($subcategories)
    {
        $products = [];

        foreach ($subcategories as $subcategory) {
            for ($i = 1; $i <= 3; $i++) {
                $title = "Product $i in SubCategory {$subcategory->id}";
                $products[] = [
                    'title' =>   $title,
                    'slug' => Str::slug($title) . '_' . time(),
                    'description' => $this->generateLoremIpsum(),
                    'price' => rand(100, 200),
                    'discount_price' => rand(80, 99),
                    'image' => "prod" . ($subcategory->id * 1 + $i) . ".jpg",
                    'sub_category_id' => $subcategory->id,
                    'category_id' => $subcategory->category_id,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert all products into the database
        Product::insert($products);
    }

    private function generateLoremIpsum()
    {
        return $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    }
}
