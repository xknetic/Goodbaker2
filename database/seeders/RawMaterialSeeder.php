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
            'type' => 'Pail x',
            'typeQuantity' => '18',
            'supplierID' => '1'
        ],

        [
            //rm 2
            'rawMaterialName' => 'Canyon Baking Powder',
            'type' => 'Pail x',
            'typeQuantity' => '15',
            'supplierID' => '1'
        ],

        [
            //rm 3
            'rawMaterialName' => 'Glucose',
            'type' => 'Pail x',
            'typeQuantity' => '20',
            'supplierID' => '1'
        ],

        [
            //rm 4
            'rawMaterialName' => 'Luster Dust ALL FLAVORS',
            'type' => 'Pail x',
            'typeQuantity' => '6',
            'supplierID' => '1'
        ],

        [
            //rm 5
            'rawMaterialName' => 'Malunggay Flakes',
            'type' => 'Box x',
            'typeQuantity' => '5',
            'supplierID' => '1'
        ],

        [
            //rm 6
            'rawMaterialName' => 'Nether C Preservative',
            'type' => 'Box x',
            'typeQuantity' => '10',
            'supplierID' => '1'
        ],

        [
            //rm 7
            'rawMaterialName' => 'Skim Milk Powder for Torta',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '1'
        ],
        
         //supplierID 2
        [
            //rm 8
            'rawMaterialName' => 'Calcium Proprionate (Niacet)',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '2'
        ], 
        
        [
            //rm 9
            'rawMaterialName' => 'Potassium Sorbate (preservative)',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '2'
        ],
        
        [
            //rm 10
            'rawMaterialName' => 'V-Ester SSL-S150',
            'type' => 'Box x',
            'typeQuantity' => '25',
            'supplierID' => '2'
        ],

        //supplierID 3
        [
            //rm 11
            'rawMaterialName' => 'Naga Rossa Flour',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '3'
        ],
        
        //supplierID 4
        [
            //rm 12
            'rawMaterialName' => 'Apito UBE Paste',
            'type' => 'Box x',
            'typeQuantity' => '16',
            'supplierID' => '4'
        ],

        
        [
            //rm 13
            'rawMaterialName' => 'Baking Powder, Panadero',
            'type' => 'Pail x',
            'typeQuantity' => '15',
            'supplierID' => '4'  
        ],

        [
            //rm 14
            'rawMaterialName' => 'Baking Soda',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 15
            'rawMaterialName' => 'Brown Paper',
            'type' => 'Bail x',
            'typeQuantity' => '100',
            'supplierID' => '4' 
        ],

        [
            //rm 16
            'rawMaterialName' => 'Bread Improver, Magimix',
            'type' => 'Box x',
            'typeQuantity' => '36',
            'supplierID' => '4' 
        ],

        [
            //rm 17
            'rawMaterialName' => 'Butter, Marvelous',
            'type' => 'Box x',
            'typeQuantity' => '36',
            'supplierID' => '4' 
        ],

        [
            //rm 18
            'rawMaterialName' => 'Cinnamon Powder',
            'type' => 'Drum x',
            'typeQuantity' => '30',
            'supplierID' => '4' 
        ],

        [
            //rm 19
            'rawMaterialName' => 'Cornstarch, Farola',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 20
            'rawMaterialName' => 'Condensed Milk',
            'type' => 'Box x',
            'typeQuantity' => '24',
            'supplierID' => '4' 
        ],
        
        [
            //rm 21
            'rawMaterialName' => 'Cracked Wheat',
            'type' => 'Bag x',
            'typeQuantity' => '10',
            'supplierID' => '4' 
        ],

        [
            //rm 22
            'rawMaterialName' => 'Dessicated Coconut',
            'type' => 'Bag x',
            'typeQuantity' => '50',
            'supplierID' => '4' 
        ],

        [
            //rm 23
            'rawMaterialName' => 'FLOUR - 3rd Class Cinderella',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 24
            'rawMaterialName' => 'FLOUR - 1st Class Kabayan',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 25
            'rawMaterialName' => 'Freeto Oil',
            'type' => 'Tin x',
            'typeQuantity' => '17',
            'supplierID' => '4' 
        ],

        [
            //rm 26
            'rawMaterialName' => 'Iodised Salt',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 27
            'rawMaterialName' => 'Margarine Spring',
            'type' => 'Drum x',
            'typeQuantity' => '45',
            'supplierID' => '4' 
        ],

        [
            //rm 28
            'rawMaterialName' => 'Powdered Sugar, Peotraco',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4' 
        ],

        [
            //rm 29
            'rawMaterialName' => 'Raisins, Eversweet',
            'type' => 'Box x',
            'typeQuantity' => '10',
            'supplierID' => '4' 
        ],

        [
            //rm 31
            'rawMaterialName' => 'Sesame Seeds',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '4'
        ],

        [
            //rm 32
            'rawMaterialName' => 'Shortening, Spring',
            'type' => 'Drum x',
            'typeQuantity' => '50',
            'supplierID' => '4'
        ],

        [
            //rm 33
            'rawMaterialName' => 'Skim Milk Brown',
            'type' => 'Bag x',
            'typeQuantity' => '50',
            'supplierID' => '4' 
        ],

        [
            //rm 34
            'rawMaterialName' => 'Sugar, White',
            'type' => 'Bag x',
            'typeQuantity' => '50',
            'supplierID' => '4'
        ],

        [
            //rm 35
            'rawMaterialName' => 'Sugar, Brown',
            'type' => 'Bag x',
            'typeQuantity' => '50',
            'supplierID' => '4'
        ],

        [
            //rm 36
            'rawMaterialName' => 'Vanilla, Penedero',
            'type' => 'Bag x',
            'typeQuantity' => '4',
            'supplierID' => '4'
        ],

        [
            //rm 37
            'rawMaterialName' => 'Yeast, Instant Success',
            'type' => 'Box x',
            'typeQuantity' => '20',
            'supplierID' => '4'
        ],

         //supplierID 5

        [
            //rm 38
            'rawMaterialName' => 'Apito Strawberry Paste',
            'type' => 'Box x',
            'typeQuantity' => '1',
            'supplierID' => '5'
        ],

        [
            //rm 39
            'rawMaterialName' => 'Apito UBE Paste',
            'type' => 'Box x',
            'typeQuantity' => '2',
            'supplierID' => '5'
        ],

        [
            //rm 40
            'rawMaterialName' => 'Apito Pandan Paste',
            'type' => 'Jug x',
            'typeQuantity' => '1',
            'supplierID' => '5'
        ],

        //supplierID 6

        [
            //rm 41
            'rawMaterialName' => 'White Chocolate Deluxe',
            'type' => 'Box x',
            'typeQuantity' => '40',
            'supplierID' => '6'
        ],

        [
            //rm 42
            'rawMaterialName' => 'Dark Chocolate Deluxe',
            'type' => 'Box x',
            'typeQuantity' => '40',
            'supplierID' => '6'
        ],

        //supplierID 7
        [
            //rm 43
            'rawMaterialName' => 'Medium',
            'type' => 'Case x',
            'typeQuantity' => '12',
            'supplierID' => '7'
        ],

        //supplierID 8
        [
            //rm 44
            'rawMaterialName' => 'Farmland Milk Powder',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '8'
        ],

        [
            //rm 45
            'rawMaterialName' => 'Milkboy Powder',
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '8'
        ],

        //supplierID 9
        [
            //rm 46
            'rawMaterialName' => 'Housin Sauce',
            'type' => 'Box x',
            'typeQuantity' => '4',
            'supplierID' => '9'
        ],

        //supplierID 10
        [
            //rm 47
            'rawMaterialName' => 'Large',
            'type' => 'Case x',
            'typeQuantity' => '12',
            'supplierID' => '10'
        ],

        [
            //rm 48
            'rawMaterialName' => 'Extra Large',
            'type' => 'Case x',
            'typeQuantity' => '12',
            'supplierID' => '10'
        ],

        //supplierID 11
        [
            //rm 49
            'rawMaterialName' => 'Magnolia Filled Cheese',
            'type' => 'Box x',
            'typeQuantity' => '6',
            'supplierID' => '11'
        ],

        //supplierID 12
        [
            //rm 50
            'rawMaterialName' => 'Marca Leon Soya Oil',
            'type' => 'Tin x',
            'typeQuantity' => '17',
            'supplierID' => '12'
        ],

        //supplierID 13
        [
            //rm 51
            'rawMaterialName' => 'Neco Color, ORANGE',
            'type' => 'Jar x',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 52
            'rawMaterialName' => 'Neco Color, STRAW RED',
            'type' => 'Jar x',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 53
            'rawMaterialName' => 'Neco Color, Egg YELLOW',
            'type' => 'Jar x',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 54
            'rawMaterialName' => 'Neco Color, UBE',
            'type' => 'Jar x',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 55
            'rawMaterialName' => 'Neco Color, APPLE GREEN',
            'type' => 'Jar x',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        [
            //rm 56
            'rawMaterialName' => 'Neco Color, CHOCO BROWN',
            'type' => 'Jar x',
            'typeQuantity' => '500',
            'supplierID' => '13'
        ],

        //supplierID 14
        [
            //rm 57
            'rawMaterialName' => 'Instant Nescafe',
            'type' => 'Pouch x',
            'typeQuantity' => '500',
            'supplierID' => '14'
        ],

        //supplierID 15
        [
            //rm 58
            'rawMaterialName' => 'Buttercreame Refrigerated Margarine (225 g)',
            'type' => 'Case x',
            'typeQuantity' => '24',
            'supplierID' => '15'
        ],

        [
            //rm 59
            'rawMaterialName' => 'Butter Creme 100',
            'type' => 'Box x',
            'typeQuantity' => '10',
            'supplierID' => '15'
        ],

        [
            //rm 60
            'rawMaterialName' => "Baker's Choice Margarine",
            'type' => 'Drum x',
            'typeQuantity' => '40',
            'supplierID' => '15'
        ],

        [
            //rm 61
            'rawMaterialName' => 'Bake Plus Shortening',
            'type' => 'Box x',
            'typeQuantity' => '10',
            'supplierID' => '15'
        ],

        [
            //rm 62
            'rawMaterialName' => 'Soya Oil',
            'type' => 'Tin x',
            'typeQuantity' => '17',
            'supplierID' => '15'
        ],

        //supplierID 16
        [
            //rm 63
            'rawMaterialName' => 'Magnifier CHOCO',
            'type' => 'Bucket x',
            'typeQuantity' => '5',
            'supplierID' => '16'
        ],

        //supplierID 17
        [
            //rm 64
            'rawMaterialName' => 'Alaska Evaporated 370mL',
            'type' => 'Bucket x',
            'typeQuantity' => '5',
            'supplierID' => '17'
        ],

        [
            //rm 65
            'rawMaterialName' => 'Brown Paper',
            'type' => 'Bail x',
            'typeQuantity' => '100',
            'supplierID' => '17'
        ],

        [
            //rm 66
            'rawMaterialName' => 'Silver Swan Soy Sauce',
            'type' => 'Bail x',
            'typeQuantity' => '4',
            'supplierID' => '17'
        ],

        [
            //rm 67
            'rawMaterialName' => 'Rose Cane Vinegar',
            'type' => 'Box x',
            'typeQuantity' => '4',
            'supplierID' => '17'
        ],

        [
            //rm 68
            'rawMaterialName' => 'Raisins',
            'type' => 'Box x',
            'typeQuantity' => '8',
            'supplierID' => '17'
        ],

        [
            //rm 69
            'rawMaterialName' => "Today Pineapple Crushed (3 Kg)",
            'type' => 'Box x',
            'typeQuantity' => '6',
            'supplierID' => '17'
        ],

        [
            //rm 70
            'rawMaterialName' => "Air-Brush Colors, All Flavors",
            'type' => 'Bottle x',
            'typeQuantity' => '255',
            'supplierID' => '17'
        ],

        [
            //rm 71
            'rawMaterialName' => "Skinless Peanut",
            'type' => 'Box x',
            'typeQuantity' => '25',
            'supplierID' => '17'
        ],

        //supplierID' => '18'
        [
            //rm 72
            'rawMaterialName' => "Favorish Light Brown GP 390-11",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '18'
        ],

        [
            //rm 73
            'rawMaterialName' => "Favorish Dark Black GP 960-11",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '18'
        ],

        //supplierID' => '19'
        [
            //rm 74
            'rawMaterialName' => "Additional Supplies",
            'type' => 'Box x',
            'typeQuantity' => '72',
            'supplierID' => '19'
        ],

        //supplierID' => '20'
        [
            //rm 75
            'rawMaterialName' => "Cocoa Light",
            'type' => 'Box x',
            'typeQuantity' => '72',
            'supplierID' => '20'
        ],
        
        //supplierID' => '21'
        [
            //rm 76
            'rawMaterialName' => "Bake Best Platinum Bread",
            'type' => 'Box x',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 77
            'rawMaterialName' => "Baron ALL-PURPOSE Flour",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 78
            'rawMaterialName' => "Hard Flour EMPEROR",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 79
            'rawMaterialName' => "Instant Yeast Emperor",
            'type' => 'Box x',
            'typeQuantity' => '20',
            'supplierID' => '21'
        ],

        [
            //rm 80
            'rawMaterialName' => "3rd Class COUNTESS",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        [
            //rm 81
            'rawMaterialName' => "Cake Flour",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '21'
        ],

        //supplierID == 22
        [
            //rm 82
            'rawMaterialName' => "Medium",
            'type' => 'Case x',
            'typeQuantity' => '12',
            'supplierID' => '22'
        ],

        [
            //rm 83
            'rawMaterialName' => "Large",
            'type' => 'Case x',
            'typeQuantity' => '12',
            'supplierID' => '22'
        ],

        //'supplierID' => '23'
        [
            //rm 84
            'rawMaterialName' => "Red Beans",
            'type' => 'Sack x',
            'typeQuantity' => '10',
            'supplierID' => '23'
        ],

        [
            //rm 85
            'rawMaterialName' => "White Beans",
            'type' => 'Sack x',
            'typeQuantity' => '10',
            'supplierID' => '23'
        ],

        [
            //rm 86
            'rawMaterialName' => "Molasses",
            'type' => 'Pail x',
            'typeQuantity' => '1',
            'supplierID' => '23'
        ],

        [
            //rm 87
            'rawMaterialName' => "Kuya TONY Tongue Root",
            'type' => 'Box x',
            'typeQuantity' => '15',
            'supplierID' => '23'
        ],

        [
            //rm 88
            'rawMaterialName' => "TVP",
            'type' => 'Bag x',
            'typeQuantity' => '25',
            'supplierID' => '23'
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
