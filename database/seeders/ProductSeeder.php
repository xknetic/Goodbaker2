<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    protected $product = [
        //cat1
        [
            'productCode' => 'BUNS',
            'productCategory' => '1',
            'productName' => 'Burger Buns',
            'unit' => 'Pack x6',
            'quantity' => '50',
        ],

        [
            'productCode' => 'CHEESE',
            'productCategory' => '1',
            'productName' => 'Cheese Buns',
            'unit' => 'Pack x8',
            'quantity' => '50',
        ],

        [   
            'productCode' => 'CINROUND',
            'productCategory' => '1',
            'productName' => 'Cinnamon Round',
            'unit' => 'Piece',
            'quantity' => '20',
        ],

        [   
            'productCode' => '00166',
            'productCategory' => '1',
            'productName' => 'Coco Nuggets',
            'unit' => 'Pack x30',
            'quantity' => '10',
        ],

        
        [   
            'productCode' => '00143',
            'productCategory' => '1',
            'productName' => 'Coco Nuggets',
            'unit' => 'Piece',
            'quantity' => '89',
        ],

        [
            'productCode' => 'DANISHB',
            'productCategory' => '1',
            'productName' => 'Dannish Cinnamon (Big)',
            'unit' => 'Piece',
            'quantity' => '50',
        ],
        
        [
            'productCode' => 'DANISHS',
            'productCategory' => '1',
            'productName' => 'Dannish Cinnamon (Small)',
            'unit' => 'Piece',
            'quantity' => '50',
        ],

        [
            'productCode' => 'DINNER',
            'productCategory' => '1',
            'productName' => 'Dinner Roll',
            'unit' => 'Piece',
            'quantity' => '60',
        ],
    
        [
            'productCode' => '00127',
            'productCategory' => '1',
            'productName' => 'Lady Finger',
            'unit' => 'Piece',
            'quantity'=> '70',
        ],

        [
            'productCode' => 'MAMON',
            'productCategory' => '1',
            'productName' => 'Mamon Kababayan',
            'unit' => 'Pack x8',
            'quantity'=> '286',
        ],

        [
            'productCode' => 'MONGO',
            'productCategory' => '1',
            'productName' => 'Mongo Bread',
            'unit' => 'Piece',
            'quantity'=> '31',
        ],


        [
            'productCode' => 'PANBIG',
            'productCategory' => '1',
            'productName' => 'Panderosa (Big)',
            'unit' => 'Piece',
            'quantity'=> '15',
        ],

        [
            'productCode' => 'PANSMALL',
            'productCategory' => '1',
            'productName' => 'Panderosa (Small)',
            'unit' => 'Piece',
            'quantity'=> '20',
        ],

        [
            'productCode' => '00093',
            'productCategory' => '1',
            'productName' => 'Pandesal (Pack)',
            'unit' => 'Pack x10',
            'quantity'=> '40',
        ],

        [
            'productCode' => '00092',
            'productCategory' => '1',
            'productName' => 'Pandesal',
            'unit' => 'Piece',
            'quantity'=> '350',
        ],

        [
            'productCode' => '00176',
            'productCategory' => '1',
            'productName' => 'Pandesal - Malunggay (Pack)',
            'unit' => 'Pack x10',
            'quantity'=> '15',
        ],

        
        [
            'productCode' => '00179',
            'productCategory' => '1',
            'productName' => 'Pandesal - Malunggay',
            'unit' => 'Piece',
            'quantity'=> '300',
        ],

        [
            'productCode' => '00144',
            'productCategory' => '1',
            'productName' => 'Raisin Buns',
            'unit' => 'Piece',
            'quantity'=> '35',
        ],

        [
            'productCode' => '00133',
            'productCategory' => '1',
            'productName' => 'Spanish Bread',
            'unit' => 'Pack x5',
            'quantity'=> '20',
        ],

        [
            'productCode' => '00188',
            'productCategory' => '1',
            'productName' => 'Spanish Bread (Choco)',
            'unit' => 'Pack x5',
            'quantity'=> '19',
        ],

        [
            'productCode' => '00157',
            'productCategory' => '1',
            'productName' => 'Spanish Bread (Ube)',
            'unit' => 'Pack x5',
            'quantity'=> '21',
        ],

        [
            'productCode' => 'CINSPECIAL',
            'productCategory' => '1',
            'productName' => 'Special Cinnamon (Big)',
            'unit' => 'Piece',
            'quantity' => '16',
        ],

        [
            'productCode' => '00116',
            'productCategory' => '1',
            'productName' => 'Special Cinnamon (Small)',
            'unit' => 'Piece',
            'quantity' => '16',
        ],

        [
            'productCode' => '00220',
            'productCategory' => '1',
            'productName' => 'Squash Pandesal (Pack)',
            'unit' => 'Pack x10',
            'quantity'=> '15',
        ],

        [
            'productCode' => '00218',
            'productCategory' => '1',
            'productName' => 'Squash Pandesal',
            'unit' => 'Piece',
            'quantity'=> '110',
        ],

        [
            'productCode' => '00117',
            'productCategory' => '1',
            'productName' => 'Ube Bites',
            'unit' => 'Pack x20',
            'quantity'=> '177',
        ],

        [
            'productCode' => 'UBEBIG',
            'productCategory' => '1',
            'productName' => 'Ube Bread (Big)',
            'unit' => 'Piece',
            'quantity'=> '59',
        ],

        [
            'productCode' => 'UBESMALL',
            'productCategory' => '1',
            'productName' => 'Ube Bread (Small)',
            'unit' => 'Piece',
            'quantity'=> '80',
        ],

        //cake
    ];
    
    public function run(): void
    {
    //
        foreach($this->product as $product) {
            Product::create($product);
        }
    }
}
     

