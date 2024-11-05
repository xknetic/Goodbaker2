<?php

namespace Database\Seeders;

use App\Models\ProductPrice;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductPriceSeeder extends Seeder
{
    protected $product_prices = [

        //cakes
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
            'price' => '36.00'
        ],

        [
            'product' => '4',
            'area' => '1',
            'price' => '62.00'
        ],

        [
            'product' => '5',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '6',
            'area' => '1',
            'price' => '40.00'        
        ],

        [
            'product' => '5',
            'area' => '1',
            'price' => '12.00'
        ],

        [
            'product' => '6',
            'area' => '1',
            'price' => '38.00'
        ],

        [
            'product' => '7',
            'area' => '1',
            'price' => '60.00'
        ],

        [
            'product' => '8',
            'area' => '1',
            'price' => '42.00'
        ],

        [
            'product' => '9',
            'area' => '1',
            'price' => '54.00'
        ],

        [
            'product' => '10',
            'area' => '1',
            'price' => '24.00'
        ],

        [
            'product' => '11',
            'area' => '1',
            'price' => '35.00'
        ],

        [
            'product' => '12',
            'area' => '1',
            'price' => '45.00'
        ],

        [
            'product' => '13',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '14',
            'area' => '1',
            'price' => '55.00'
        ],

        [
            'product' => '15',
            'area' => '1',
            'price' => '26.00'
        ],

        [
            'product' => '16',
            'area' => '1',
            'price' => '35.00'
        ],

        [
            'product' => '17',
            'area' => '1',
            'price' => '20.00'
        ],

        [
            'product' => '18',
            'area' => '1',
            'price' => '20.00'
        ],

        [
            'product' => '19',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '20',
            'area' => '1',
            'price' => '42.00'        
        ],

        [
            'product' => '21',
            'area' => '1',
            'price' => '50.00'
        ],
        //cakes
        [
            'product' => '22',
            'area' => '1',
            'price' => '350.00'
        ],

        [
            'product' => '23',
            'area' => '1',
            'price' => '300.00'
        ],

        [
            'product' => '24',
            'area' => '1',
            'price' => '290.00'
        ],

        [
            'product' => '25',
            'area' => '1',
            'price' => '550.00'
        ],

        [
            'product' => '26',
            'area' => '1',
            'price' => '295.00'
        ],

        [
           'product' => '27',
            'area' => '1',
            'price' => '160.00'
        ],

        [
            'product' => '28',
            'area' => '1',
            'price' => '550.00'
        ],

        [
            'product' => '29',
            'area' => '1',
            'price' => '550.00'
        ],

        [
            'product' => '30',
            'area' => '1',
            'price' => '590.00'
        ],

        //pastries
       
        [
            'product' => '31',
            'area' => '1',
            'price' => '12.00'
        ],

        [
            'product' => '32',
            'area' => '1',
            'price' => '90.00'
        ],

        [
            'product' => '33',
            'area' => '1',
            'price' => '22.00'
        ],

        [
            'product' => '34',
            'area' => '1',
            'price' => '240.00'
        ],

        [
            'product' => '35',
            'area' => '1',
            'price' => '130.00'
        ],

        [
            'product' => '36',
            'area' => '1',
            'price' => '45.00'
        ],

        [
            'product' => '37',
            'area' => '1',
            'price' => '26.00'
        ],

        [
            'product' => '38',
            'area' => '1',
            'price' => '22.00'
        ],

        [
            'product' => '39',
            'area' => '1',
            'price' => '22.00'
        ],

        [
            'product' => '40',
            'area' => '1',
            'price' => '275.00'
        ],

        [
            'product' => '41',
            'area' => '1',
            'price' => '8.00'
        ],

        [
            'product' => '42',
            'area' => '1',
            'price' => '29.00'
        ],

        [
            'product' => '43',
            'area' => '1',
            'price' => '26.00'
        ],

        [
            'product' => '44',
            'area' => '1',
            'price' => '26.00'
        ],

        [
            'product' => '45',
            'area' => '1',
            'price' => '10.00'
        ],

        [
            'product' => '46',
            'area' => '1',
            'price' => '150.00'
        ],

        [
            'product' => '43',
            'area' => '1',
            'price' => '22.00'
        ],

        //PASALUBONG
        [
            'product' => '44',
            'area' => '1',
            'price' => '38.00'
        ],

        [
            'product' => '45',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '46',
            'area' => '1',
            'price' => '85.00'
        ],

        [
            'product' => '47',
            'area' => '1',
            'price' => '32.00'
        ],
       
        
        [
            'product' => '48',
            'area' => '1',
            'price' => '100.00'
        ],

        [
            'product' => '49',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '50',
            'area' => '1',
            'price' => '50.00'
        ],

        [
            'product' => '51',
            'area' => '1',
            'price' => '32.00'
        ],

        [
            'product' => '52',
            'area' => '1',
            'price' => '100.00'
        ],

        [
            'product' => '53',
            'area' => '1',
            'price' => '38.00'
        ],

        [
            'product' => '54',
            'area' => '1',
            'price' => '45.00'
        ],

        [
            'product' => '55',
            'area' => '1',
            'price' => '130.00'
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
     

