<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======
>>>>>>> ccf9f6e (8/11)
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
<<<<<<< HEAD

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
=======
>>>>>>> ccf9f6e (8/11)
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
<<<<<<< HEAD
        foreach($this->suppliers as $suppliers) {
            Supplier::create($suppliers);
        }
 
    }
}

=======
        Supplier::create([
            'supplierName' => 'a'
        ]);

        Supplier::create([
            'supplierName' => 'b'
        ]);
    }
}
>>>>>>> ccf9f6e (8/11)
