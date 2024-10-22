<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Category 1',
                'image' => 'ca1.jpg',
                'description' => 'Description for category 1',
                'status' => '1', 
            ],
            [
                'name' => 'Category 2',
                'image' => 'ca2.jpg',
                'description' => 'Description for category 2',
                'status' => '1', 
            ],
            [
                'name' => 'Category 3',
                'image' => 'ca3.jpg',
                'description' => 'Description for category 3',
                'status' => '1', 
            ],
        ];


        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
