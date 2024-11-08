<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{

    protected $suppliers = [
        [
            'supplierName' => 'Achievers Food and Bakery Ingredients Corp'   
        ], 
    
        [
            'supplierName' => 'Asco Marketing'   
        ],
    
        [
            'supplierName' => "Asian Grains"   
        ],

        [
            'supplierName' => "A's Valley Enterprise"   
        ],
    
        [
            'supplierName' => 'Bakels Philippines Inc.'   
        ],
        
        [
            'supplierName' => 'Delicatesse Food Corporation'   
        ],
    
        [
            'supplierName' => 'DLM Poultry Eggs'   
        ],
    
        [
            'supplierName' => 'Efgen Marketing'   
        ],
    
        [
            'supplierName' => 'F.Y Sons'   
        ],
    
        [
            'supplierName' => 'Golden Eggs - Mapandan'   
        ],
    
        [
            'supplierName' => 'Granville Supply Chain Management Corp'   
        ],
    
        [
            'supplierName' => 'Limketkai Manufacturing Corporation'   
        ],
    
        [
            'supplierName' => 'MJM Commercial'   
        ],
    
        [
            'supplierName' => 'NAPINTAS Commercial'   
        ],
    
        [
            'supplierName' => 'OLEO-FATS Incorporated'   
        ],
    
        [
            'supplierName' => 'Puratos Philippines'   
        ],
    
        [
            'supplierName' => 'SBCO Merchandise'   
        ],
    
        [
            'supplierName' => 'SANMIE Food'   
        ],
    
        [
            'supplierName' => 'TIONG SAN Supermart'   
        ],
    
        [
            'supplierName' => 'UNICOM'   
        ],
    
        [
            'supplierName' => 'SAN MIGUEL Corporation'   
        ],

        [
            'supplierName' => 'SHERWIN Eggs'   
        ],

        [
            'supplierName' => 'OUT SOURCE'   
        ],

    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach($this->suppliers as $suppliers) {
            Supplier::create($suppliers);
        }
 
    }
}

