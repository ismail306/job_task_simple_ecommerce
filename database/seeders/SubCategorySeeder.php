<?php

namespace Database\Seeders;

use App\Models\Admin\SubCategory;
use Illuminate\Database\Seeder;


class SubCategorySeeder extends Seeder
{
    public function run()
    {

        $subcategories = [
            [
                'name' => 'SubCategory 1.1',
                'category_id' => 1, 
                'image' => 'subcat1_1.jpg',
                'status' => 1, 
            ],
            [
                'name' => 'SubCategory 1.2',
                'category_id' => 1, 
                'image' => 'subcat1_2.jpg',
                'status' => 1, 
            ],
            [
                'name' => 'SubCategory 1.3',
                'category_id' => 1, 
                'image' => 'subcat1_3.jpg',
                'status' => 1, 
            ],

         
            [
                'name' => 'SubCategory 2.1',
                'category_id' => 2, 
                'image' => 'subcat2_1.jpg',
                'status' => 1,
            ],
            [
                'name' => 'SubCategory 2.2',
                'category_id' => 2, 
                'image' => 'subcat2_2.jpg',
                'status' => 1, 
            ],
            [
                'name' => 'SubCategory 2.3',
                'category_id' => 2,
                'image' => 'subcat2_3.jpg',
                'status' => 1, 
            ],

      
            [
                'name' => 'SubCategory 3.1',
                'category_id' => 3,
                'image' => 'subcat3_1.jpg',
                'status' => 1,
            ],
            [
                'name' => 'SubCategory 3.2',
                'category_id' => 3, 
                'image' => 'subcat3_2.jpg',
                'status' => 1, 
            ],
            [
                'name' => 'SubCategory 3.3',
                'category_id' => 3,
                'image' => 'subcat3_3.jpg',
                'status' => 1, 
            ],
        ];

       
        foreach ($subcategories as $subcategoryData) {
            SubCategory::create($subcategoryData);
        }
    }
}
