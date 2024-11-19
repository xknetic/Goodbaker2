<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    protected $product_categories = [
        [//1
            'categoryName' => "Bread"
        ],

        [//2
            'categoryName' => "Cakes"
        ],

        [//3
            'categoryName' => "Pastries"
        ],

        [//4
            'categoryName' => "Pasalubong"
        ],

        [//5
            'categoryName' => "Hotbakes"
        ],

       


        
    ];

    public function run(): void
    {
    //
        foreach($this->product_categories as $product_categories) {
            ProductCategory::create($product_categories);
        }

    }
}
     

