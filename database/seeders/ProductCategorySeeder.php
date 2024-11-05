<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    protected $product_categories = [
        [
            'categoryName' => "Bread"
        ],

        [
            'categoryName' => "Cakes"
        ],

        [
            'categoryName' => "Pastries"
        ],

        [
            'categoryName' => "Pasalubong"
        ],

        [
            'categoryName' => "Hotbakes"
        ],

        [
            'categoryName' => "Loaves"
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
     

