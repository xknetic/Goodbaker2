<?php

namespace Database\Seeders;

use App\Models\ProductIngredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductIngredientSeeder extends Seeder
{
    protected $product_ingredients = [
        
        [            
            'quantity' => '50',
            'unit' => 'kgs',
            'product' => '1',
            'premix' => '1',
        ],

        [            
            'quantity' => '50',
            'unit' => 'kgs',
            'product' => '2',
            'premix' => '2',
        ],

        [            
            'quantity' => '40',
            'unit' => 'kgs',
            'product' => '3',
            'premix' => '3',
        ],

        [            
            'quantity' => '19',
            'unit' => 'kgs',
            'product' => '4',
            'premix' => '4',
        ],

        [            
            'quantity' => '21',
            'unit' => 'kgs',
            'product' => '5',
            'premix' => '4',
        ],

        [            
            'quantity' => '13',
            'unit' => 'kgs',
            'product' => '6',
            'premix' => '5',
        ],

        [            
            'quantity' => '24',
            'unit' => 'kgs',
            'product' => '7',
            'premix' => '5',
        ],

        [            
            'quantity' => '33',
            'unit' => 'kgs',
            'product' => '8',
            'premix' => '6',
        ],

        [            
            'quantity' => '51',
            'unit' => 'kgs',
            'product' => '9',
            'premix' => '7',
        ],

        [            
            'quantity' => '37',
            'unit' => 'kgs',
            'product' => '10',
            'premix' => '8',
        ],

        [            
            'quantity' => '25',
            'unit' => 'kgs',
            'product' => '11',
            'premix' => '9',
        ],

        [            
            'quantity' => '41',
            'unit' => 'kgs',
            'product' => '12',
            'premix' => '10',
        ],

        [            
            'quantity' => '50',
            'unit' => 'kgs',
            'product' => '13',
            'premix' => '10',
        ],

        [            
            'quantity' => '33',
            'unit' => 'kgs',
            'product' => '14',
            'premix' => '11',
        ],

        [            
            'quantity' => '21',
            'unit' => 'kgs',
            'product' => '15',
            'premix' => '11',
        ],

        [            
            'quantity' => '16',
            'unit' => 'kgs',
            'product' => '16',
            'premix' => '12',
        ],

        [            
            'quantity' => '15',
            'unit' => 'kgs',
            'product' => '17',
            'premix' => '12',
        ],

        [            
            'quantity' => '16',
            'unit' => 'kgs',
            'product' => '18',
            'premix' => '13',
        ],

        [            
            'quantity' => '10',
            'unit' => 'kgs',
            'product' => '19',
            'premix' => '14',
        ],

        [            
            'quantity' => '8',
            'unit' => 'kgs',
            'product' => '19',
            'premix' => '15',
        ],

        [            
            'quantity' => '10',
            'unit' => 'kgs',
            'product' => '20',
            'premix' => '14',
        ],

        [            
            'quantity' => '8',
            'unit' => 'kgs',
            'product' => '20',
            'premix' => '16',
        ],

        [            
            'quantity' => '10',
            'unit' => 'kgs',
            'product' => '21',
            'premix' => '14',
        ],

        [            
            'quantity' => '8',
            'unit' => 'kgs',
            'product' => '21',
            'premix' => '17',
        ],

        [            
            'quantity' => '16',
            'unit' => 'kgs',
            'product' => '22',
            'premix' => '18',
        ],

        [            
            'quantity' => '19',
            'unit' => 'kgs',
            'product' => '23',
            'premix' => '18',
        ],

        [            
            'quantity' => '17',
            'unit' => 'kgs',
            'product' => '24',
            'premix' => '19',
        ],

        [            
            'quantity' => '19',
            'unit' => 'kgs',
            'product' => '25',
            'premix' => '19',
        ],

        [            
            'quantity' => '21',
            'unit' => 'kgs',
            'product' => '26',
            'premix' => '20',
        ],

        [            
            'quantity' => '32',
            'unit' => 'kgs',
            'product' => '27',
            'premix' => '21',
        ],

        [            
            'quantity' => '31',
            'unit' => 'kgs',
            'product' => '28',
            'premix' => '21',
        ],

        //cakes
        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '29',
            'premix' => '22',
        ],

        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '30',
            'premix' => '30',
        ],

        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '31',
            'premix' => '22',
        ],

        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '32',
            'premix' => '22',
        ],

        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '33',
            'premix' => '31',
        ],

        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '34',
            'premix' => '25',
        ],


        [            
            'quantity' => '2',
            'unit' => 'kgs',
            'product' => '35',
            'premix' => '27',
        ],


        [            
            'quantity' => '1',
            'unit' => 'kg',
            'product' => '36',
            'premix' => '22',
        ],
       
        //pastries
        [            
            'quantity' => '1',
            'unit' => 'kg',
            'product' => '37',
            'premix' => '32',
        ],
        //pasalubong
        [            
            'quantity' => '1',
            'unit' => 'kg',
            'product' => '38',
            'premix' => '33',
        ],
        //hotbakes
        [            
            'quantity' => '1',
            'unit' => 'kg',
            'product' => '39',
            'premix' => '34',
        ],  
    ];
    public function run(): void
    {
        
        foreach($this->product_ingredients as $product_ingredients) {
            ProductIngredient::create($product_ingredients);
        }
 
    }
}
