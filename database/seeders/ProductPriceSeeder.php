<?php

namespace Database\Seeders;

use App\Models\ProductPrice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductPriceSeeder extends Seeder
{
    protected $product_prices = [
        
        //bread
        [
            'product' => '1',
            'area' => '1',
            'price' => '30.00'
        ],

        [
            'product' => '2',
            'area' => '1',
            'price' => '34.00'
        ],

        [   
            'product' => '3',
            'area' => '1',
            'price' => '30.00'
        ],

        [   
            'product' => '4',
            'area' => '1',
            'price' => '20.00'
        ],

        
        [   
            'product' => '5',
            'area' => '1',
            'price' => '3.00'
        ],

        [
            'product' => '6',
            'area' => '1',
            'price' => '36.00'
        ],
        
        [
            'product' => '7',
            'area' => '1',
            'price' => '18.00'
        ],

        [
            'product' => '8',
            'area' => '1',
            'price' => '18.00'
        ],
    
        [
            'product' => '9',
            'area' => '1',
            'price' => '12.00'
        ],

        [
            'product' => '10',
            'area' => '1',
            'price' => '38.00'
        ],

        [
            'product' => '11',
            'area' => '1',
            'price' => '18.00'
        ],


        [
            'product' => '12',
            'area' => '1',
            'price' => '36.00'
        ],

        [
            'product' => '13',
            'area' => '1',
            'price' => '18.00'
        ],

        [
            'product' => '14',
            'area' => '1',
            'price' => '24.00'
        ],

        [
            'product' => '15',
            'area' => '1',
            'price' => '3.00'
        ],

        [
            'product' => '16',
            'area' => '1',
            'price' => '40.00'
        ],

        
        [
            'product' => '17',
            'area' => '1',
            'price' => '4.00'
        ],

        [
            'product' => '18',
            'area' => '1',
            'price' => '18.00'
        ],

        [
            'product' => '19',
            'area' => '1',
            'price' => '26.00'
        ],

        [
            'product' => '20',
            'area' => '1',
            'price' => '28.00'
        ],

        [
            'product' => '21',
            'area' => '1',
            'price' => '28.00'
        ],

        [
            'product' => '22',
            'area' => '1',
            'price' => '41.00'
        ],

        [
            'product' => '23',
            'area' => '1',
            'price' => '19.00'
        ],

        [
            'product' => '24',
            'area' => '1',
            'price' => '40.00'
        ],

        [
            'product' => '25',
            'area' => '1',
            'price' => '4.00'
        ],

        [
            'product' => '26',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '27',
            'area' => '1',
            'price' => '38.00'
        ],

        [
            'product' => '28',
            'area' => '1',
            'price' => '19.00'
        ],

        //cake
        [
            'product' => '29',
            'area' => '1',
            'price' => '115.00'
        ],

        [
            'product' => '30',
            'area' => '1',
            'price' => '115.00'
        ],

        [
            'product' => '31',
            'area' => '1',
            'price' => '115.00'
        ],

        [
            'product' => '32',
            'area' => '1',
            'price' => '115.00'
        ],

        [
            'product' => '33',
            'area' => '1',
            'price' => '115.00'
        ],

        [
            'product' => '34',
            'area' => '1',
            'price' => '115.00'
        ],

        [
            'product' => '35',
            'area' => '1',
            'price' => '115.00'
        ],

        //8-round
        [
            'product' => '36',
            'area' => '1',
            'price' => '225.00'
        ],

        //Pastries
        [
            'product' => '37',
            'area' => '1',
            'price' => '80.00'
        ],

        //Pasalubong
        [
            'product' => '38',
            'area' => '1',
            'price' => '28.00'
        ],

        //Hotbakes
        [
            'product' => '38',
            'area' => '1',
            'price' => '20.00'
        ],
    ];
    
    public function run(): void
    {
    //
        foreach($this->product_prices as $product_prices) {
            ProductPrice::create($product_prices);
        }

    }
}
     

