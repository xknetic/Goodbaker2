<?php

namespace Database\Seeders;

use App\Models\RawMaterial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RawMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $rawMaterials = [
        
        //supplierID 1
        [
            //rm 1
            'rawMaterialName' => 'B.O.S.',
            'type' => 'Pail',
            'typeQuantity' => '18',
            'supplierID' => '1'
        ],

        [
            //rm 2
            'rawMaterialName' => 'Canyon Baking Powder',
            'type' => 'Pail',
            'typeQuantity' => '15',
            'supplierID' => '1'
        ],

        [
            //rm 3
            'rawMaterialName' => 'Glucose',
            'type' => 'Pail',
            'typeQuantity' => '20',
            'supplierID' => '1'
        ],

        [
            //rm 4
            'rawMaterialName' => 'Luster Dust ALL FLAVORS',
            'type' => 'Pail',
            'typeQuantity' => '6',
            'supplierID' => '1'
        ],

        [
            //rm 5
            'rawMaterialName' => 'Malunggay Flakes',
            'type' => 'Box',
            'typeQuantity' => '5',
            'supplierID' => '1'
        ],

        [
            //rm 6
            'rawMaterialName' => 'Nether C Preservative',
            'type' => 'Box',
            'typeQuantity' => '10',
            'supplierID' => '1'
        ],

        [
            //rm 7
            'rawMaterialName' => 'Skim Milk Powder for Torta',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '1'
        ],
        
         //supplierID 2
        [
            //rm 8
            'rawMaterialName' => 'Calcium Proprionate (Niacet)',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '2'
        ], 
        
        [
            //rm 9
            'rawMaterialName' => 'Potassium Sorbate (preservative)',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '2'
        ],
        
        [
            //rm 10
            'rawMaterialName' => 'V-Elster SSL-S150',
            'type' => 'Box',
            'typeQuantity' => '25',
            'supplierID' => '2'
        ],

        //supplierID 3
        [
            //rm 11
            'rawMaterialName' => 'Naga Rossa Flour',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '3'
        ],
        
        //supplierID 4
        [
            //rm 12
            'rawMaterialName' => 'Apito UBE Paste',
            'type' => 'Box',
            'typeQuantity' => '16',
            'supplierID' => '4'
        ],

        
        [
            //rm 13
            'rawMaterialName' => 'Baking Powder, Panadero',
            'type' => 'Pail',
            'typeQuantity' => '15',
            'supplierID' => '4'  
        ],

        [
            //rm 14
            'rawMaterialName' => 'Baking Soda',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 15
            'rawMaterialName' => 'Brown Paper',
            'type' => 'Bail',
            'typeQuantity' => '100',
            'supplierID' => '4' 
        ],

        [
            //rm 16
            'rawMaterialName' => 'Bread Improver, Magimix',
            'type' => 'Box',
            'typeQuantity' => '36',
            'supplierID' => '4' 
        ],

        [
            //rm 17
            'rawMaterialName' => 'Butter, Marvelous',
            'type' => 'Box',
            'typeQuantity' => '36',
            'supplierID' => '4' 
        ],

        [
            //rm 18
            'rawMaterialName' => 'Cinnamon Powder',
            'type' => 'Drum',
            'typeQuantity' => '30',
            'supplierID' => '4' 
        ],

        [
            //rm 19
            'rawMaterialName' => 'Cornstarch, Farola',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 20
            'rawMaterialName' => 'Condensed Milk',
            'type' => 'Box',
            'typeQuantity' => '24',
            'supplierID' => '4' 
        ],
        
        [
            //rm 21
            'rawMaterialName' => 'Cracked Wheat',
            'type' => 'Bag',
            'typeQuantity' => '10',
            'supplierID' => '4' 
        ],

        [
            //rm 22
            'rawMaterialName' => 'Dessicated Coconut',
            'type' => 'Bag',
            'typeQuantity' => '50',
            'supplierID' => '4' 
        ],

        [
            //rm 23
            'rawMaterialName' => 'FLOUR - 3rd Class Cinderella',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 24
            'rawMaterialName' => 'FLOUR - 1st Class Kabayan',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 25
            'rawMaterialName' => 'Freeto Oil',
            'type' => 'Tin',
            'typeQuantity' => '17',
            'supplierID' => '4' 
        ],

        [
            //rm 26
            'rawMaterialName' => 'Iodised Salt',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 27
            'rawMaterialName' => 'Margarine Spring',
            'type' => 'Drum',
            'typeQuantity' => '45',
            'supplierID' => '4' 
        ],

        [
            //rm 28
            'rawMaterialName' => 'Powdered Sugar, Peotraco',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 29
            'rawMaterialName' => 'Raisins, Eversweet',
            'type' => 'Box',
            'typeQuantity' => '10',
            'supplierID' => '4' 
        ],

        [
            //rm 30
            'rawMaterialName' => 'Sesame Seeds',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '4'
        ],

        [
            //rm 31
            'rawMaterialName' => 'Shortening, Spring',
            'type' => 'Drum',
            'typeQuantity' => '50',
            'supplierID' => '4'
        ],

        [
            //rm 32
            'rawMaterialName' => 'Skim Milk Brown',
            'type' => 'Bag',
            'typeQuantity' => '50',
            'supplierID' => '4' 
        ],

        [
            //rm 33
            'rawMaterialName' => 'Sugar, White',
            'type' => 'Bag',
            'typeQuantity' => '50',
            'supplierID' => '4'
        ],

        [
            //rm 34
            'rawMaterialName' => 'Sugar, Brown',
            'type' => 'Bag',
            'typeQuantity' => '50',
            'supplierID' => '4'
        ],

        [
            //rm 35
            'rawMaterialName' => 'Vanilla, Penedero',
            'type' => 'Bag',
            'typeQuantity' => '4',
            'supplierID' => '4'
        ],

        [
            //rm 36
            'rawMaterialName' => 'Yeast, Instant Success',
            'type' => 'Box',
            'typeQuantity' => '20',
            'supplierID' => '4'
        ],

         //supplierID 5

        [
            //rm 37
            'rawMaterialName' => 'Apito Strawberry Paste',
            'type' => 'Box',
            'typeQuantity' => '1',
            'supplierID' => '5'
        ],

        [
            //rm 38
            'rawMaterialName' => 'Apito UBE Paste',
            'type' => 'Box',
            'typeQuantity' => '2',
            'supplierID' => '5'
        ],

        [
            //rm 39
            'rawMaterialName' => 'Apito Pandan Paste',
            'type' => 'Jug',
            'typeQuantity' => '1',
            'supplierID' => '5'
        ],

        //supplierID 6

        [
            //rm 40
            'rawMaterialName' => 'White Chocolate Deluxe',
            'type' => 'Box',
            'typeQuantity' => '40',
            'supplierID' => '6'
        ],

        [
            //rm 41
            'rawMaterialName' => 'Dark Chocolate Deluxe',
            'type' => 'Box',
            'typeQuantity' => '40',
            'supplierID' => '6'
        ],

        //supplierID 7
        [
            //rm 42
            'rawMaterialName' => 'Medium',
            'type' => 'Case',
            'typeQuantity' => '12',
            'supplierID' => '7'
        ],

        //supplierID 8
        [
            //rm 43
            'rawMaterialName' => 'Farmland Milk Powder',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '8'
        ],

        [
            //rm 44
            'rawMaterialName' => 'Milkboy Powder',
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '8'
        ],

        //supplierID 9
        [
            //rm 45
            'rawMaterialName' => 'Housin Sauce',
            'type' => 'Box',
            'typeQuantity' => '4',
            'supplierID' => '9'
        ],

        //supplierID 10
        [
            //rm 46
            'rawMaterialName' => 'Large',
            'type' => 'Case',
            'typeQuantity' => '144',
            'supplierID' => '10'
        ],

        [
            //rm 47
            'rawMaterialName' => 'Extra Large',
            'type' => 'Case',
            'typeQuantity' => '144',
            'supplierID' => '10'
        ],

        //supplierID 11
        [
            //rm 48
            'rawMaterialName' => 'Magnolia Filled Cheese',
            'type' => 'Box',
            'typeQuantity' => '6',
            'supplierID' => '11'
        ],

        //supplierID 12
        [
            //rm 49
            'rawMaterialName' => 'Marca Leon Soya Oil',
            'type' => 'Tin',
            'typeQuantity' => '17',
            'supplierID' => '12'
        ],

        //supplierID 13
        [
            //rm 50
            'rawMaterialName' => 'Neco Color, ORANGE',
            'type' => 'Jar',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 51
            'rawMaterialName' => 'Neco Color, STRAW RED',
            'type' => 'Jar',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 52
            'rawMaterialName' => 'Neco Color, Egg YELLOW',
            'type' => 'Jar',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 53
            'rawMaterialName' => 'Neco Color, UBE',
            'type' => 'Jar',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 54
            'rawMaterialName' => 'Neco Color, APPLE GREEN',
            'type' => 'Jar',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 55
            'rawMaterialName' => 'Neco Color, CHOCO BROWN',
            'type' => 'Jar',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        //supplierID 14
        [
            //rm 56
            'rawMaterialName' => 'Instant Nescafe',
            'type' => 'Pouch',
            'typeQuantity' => '500',
            'supplierID' => '14'
        ],

        //supplierID 15
        [
            //rm 57
            'rawMaterialName' => 'Buttercreame Refrigerated Margarine (225 g)',
            'type' => 'Case',
            'typeQuantity' => '24',
            'supplierID' => '15'
        ],

        [
            //rm 58
            'rawMaterialName' => 'Butter Creme 100',
            'type' => 'Box',
            'typeQuantity' => '10',
            'supplierID' => '15'
        ],

        [
            //rm 59
            'rawMaterialName' => "Baker's Choice Margarine",
            'type' => 'Drum',
            'typeQuantity' => '40',
            'supplierID' => '15'
        ],

        [
            //rm 60
            'rawMaterialName' => 'Bake Plus Shortening',
            'type' => 'Box',
            'typeQuantity' => '10',
            'supplierID' => '15'
        ],

        [
            //rm 61
            'rawMaterialName' => 'Soya Oil',
            'type' => 'Tin',
            'typeQuantity' => '17',
            'supplierID' => '15'
        ],

        //supplierID 16
        [
            //rm 62
            'rawMaterialName' => 'Magnifier CHOCO',
            'type' => 'Bucket',
            'typeQuantity' => '5',
            'supplierID' => '16'
        ],

        //supplierID 17
        [
            //rm 63
            'rawMaterialName' => 'Alaska Evaporated 370mL',
            'type' => 'Bucket',
            'typeQuantity' => '5',
            'supplierID' => '17'
        ],

        [
            //rm 64
            'rawMaterialName' => 'Brown Paper',
            'type' => 'Bail',
            'typeQuantity' => '100',
            'supplierID' => '17'
        ],

        [
            //rm 65
            'rawMaterialName' => 'Silver Swan Soy Sauce',
            'type' => 'Bail',
            'typeQuantity' => '4',
            'supplierID' => '17'
        ],

        [
            //rm 66
            'rawMaterialName' => 'Rose Cane Vinegar',
            'type' => 'Box',
            'typeQuantity' => '4',
            'supplierID' => '17'
        ],

        [
            //rm 67
            'rawMaterialName' => 'Raisins',
            'type' => 'Box',
            'typeQuantity' => '8',
            'supplierID' => '17'
        ],

        [
            //rm 68
            'rawMaterialName' => "Today Pineapple Crushed (3 Kg)",
            'type' => 'Box',
            'typeQuantity' => '6',
            'supplierID' => '17'
        ],

        [
            //rm 69
            'rawMaterialName' => "Air-Brush Colors, All Flavors",
            'type' => 'Bottle',
            'typeQuantity' => '255',
            'supplierID' => '17'
        ],

        [
            //rm 70
            'rawMaterialName' => "Skinless Peanut",
            'type' => 'Box',
            'typeQuantity' => '25',
            'supplierID' => '17'
        ],

        //supplierID' => '18'
        [
            //rm 71
            'rawMaterialName' => "Favorish Light Brown GP 390-11",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '18'
        ],

        [
            //rm 72
            'rawMaterialName' => "Favorish Dark Black GP 960-11",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '18'
        ],

        //supplierID' => '19'
        [
            //rm 73
            'rawMaterialName' => "Additional Supplies",
            'type' => 'Box',
            'typeQuantity' => '72',
            'supplierID' => '19'
        ],

        //supplierID' => '20'
        [
            //rm 74
            'rawMaterialName' => "Cocoa Light",
            'type' => 'Box',
            'typeQuantity' => '72',
            'supplierID' => '20'
        ],
        
        //supplierID' => '21'
        [
            //rm 75
            'rawMaterialName' => "Bake Best Platinum Bread",
            'type' => 'Box',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 76
            'rawMaterialName' => "Baron ALL-PURPOSE Flour",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 77
            'rawMaterialName' => "Hard Flour EMPEROR",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 78
            'rawMaterialName' => "Instant Yeast Emperor",
            'type' => 'Box',
            'typeQuantity' => '20',
            'supplierID' => '21'
        ],

        [
            //rm 79
            'rawMaterialName' => "3rd Class COUNTESS",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 80
            'rawMaterialName' => "Cake Flour",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        //supplierID == 22
        [
            //rm 81
            'rawMaterialName' => "Medium",
            'type' => 'Case',
            'typeQuantity' => '12',
            'supplierID' => '22'
        ],

        [
            //rm 82
            'rawMaterialName' => "Large",
            'type' => 'Case',
            'typeQuantity' => '12',
            'supplierID' => '22'
        ],

        //'supplierID' => '23'
        [
            //rm 83
            'rawMaterialName' => "Red Beans",
            'type' => 'Sack',
            'typeQuantity' => '10',
            'supplierID' => '23'
        ],

        [
            //rm 84
            'rawMaterialName' => "White Beans",
            'type' => 'Sack',
            'typeQuantity' => '10',
            'supplierID' => '23'
        ],

        [
            //rm 85
            'rawMaterialName' => "Molasses",
            'type' => 'Pail',
            'typeQuantity' => '1',
            'supplierID' => '23'
        ],

        [
            //rm 86
            'rawMaterialName' => "Kuya TONY Tongue Root",
            'type' => 'Box',
            'typeQuantity' => '15',
            'supplierID' => '23'
        ],

        [
            //rm 87
            'rawMaterialName' => "TVP",
            'type' => 'Bag',
            'typeQuantity' => '25',
            'supplierID' => '23'
        ],
        
        //extra
        [
            //rm 88
            'rawMaterialName' => "Cream of Tartar",
            'type' => 'Pack',
            'typeQuantity' => '20',
            'supplierID' => '2'
        ],

        [
            //rm 89
            'rawMaterialName' => "Mongo Seeds",
            'type' => 'Pack',
            'typeQuantity' => '14',
            'supplierID' => '23'
        ],

        [
            //rm 90
            'rawMaterialName' => "Apito Yema Paste",
            'type' => 'Pack',
            'typeQuantity' => '20',
            'supplierID' => '4'
        ],


    ];

    public function run(): void
    {
        //
        foreach($this->rawMaterials as $rawMaterials) {
            RawMaterial::create($rawMaterials);
        }
 
    }
}
