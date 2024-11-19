<?php

namespace Database\Seeders;

use App\Models\Premix;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PremixSeeder extends Seeder
{
    /*$table->string('premixName', 100);
    $table->string('category', 25)->nullable();
    $table->string('size', 25)->nullable();
    $table->integer('quantity');
    $table->float('cost');
    $table->integer('criticalLevel')->nullable();*/

    protected $premixes = [
        [    
            'premixName' => 'Burger Buns Premix',
            'size' => 'Kgs',
            'quantity' => '50',
            'cost' => '213.02'
        ],

        [   
            'premixName' => 'Cheese Buns Premix',
            'size' => 'Kgs',
            'quantity' => '50',
            'cost' => '330.12'
        ],

        [    
            'premixName' => 'Cinnamon Round Premix',
            'size' => 'Kgs',
            'quantity' => '40',
            'cost' => '215.00'
        ],

        [ 
            'premixName' => 'Coco Nuggets Premix',
            'size' => 'Kgs',
            'quantity' => '50',
            'cost' => '158.44'
        ],

        [
            'premixName' => 'Dannish Cinnamon Premix',
            'size' => 'Kgs',
            'quantity' => '50',
            'cost' => '165.33'
        ],

        [
            'premixName' => 'Dinner Roll Premix',
            'size' => 'Kgs',
            'quantity' => '18',
            'cost' => '144.20'
        ],
    
        [
            'premixName' => 'Lady Finger Premix',
            'size' => 'Kgs',
            'quantity' => '19',
            'cost' => '178.12'
        ],

        [
            'premixName' => 'Mamon Kababayan Premix',
            'size' => 'Kgs',
            'quantity' => '11',
            'cost' => '167.28'
        ],

        [
            'premixName' => 'Mongo Bread Premix',
            'size' => 'Kgs',
            'quantity' => '16',
            'cost' => '145.10'
        ],

        [
            'premixName' => 'Panderosa Premix',
            'size' => 'Kgs',
            'quantity' => '18',
            'cost' => '208.11'
        ],

        [
            'premixName' => 'Pandesal Premix',
            'size' => 'Kgs',
            'quantity' => '35',
            'cost' => '171.60'
        ],

        [
            'premixName' => 'Pandesal-Malunggay Premix ',
            'size' => 'Kgs',
            'quantity' => '21',
            'cost' => '185.40'
        ],

        [
            'premixName' => 'Raisin Buns Premix',
            'size' => 'Kgs',
            'quantity' => '26',
            'cost' => '150.20'
        ],

        [
            'premixName' => 'Spanish Bread Premix',
            'size' => 'Kgs',
            'quantity' => '24',
            'cost' => '120.03'
        ],

        [    
            'premixName' => 'Spanish Filling Premix',
            'size' => 'Kgs',
            'quantity' => '15',
            'cost' => '248.15'
        ],

        [
            'premixName' => 'Spanish Filling (Choco) Premix',
            'size' => 'Kgs',
            'quantity' => '15',
            'cost' => '128.00'
        ],

        [
            'premixName' => 'Spanish Filling (Ube) Premix',
            'size' => 'Kgs',
            'quantity' => '16',
            'cost' => '128.00'
        ],

        [
            'premixName' => 'Special Cinnamon Premix',
            'size' => 'Kgs',
            'quantity' => '11',
            'cost' => '197.20'
        ],

        [    
            'premixName' => 'Squash Pandesal Premix',
            'size' => 'Kgs',
            'quantity' => '10',
            'cost' => '218.55'
        ],

        [   
            'premixName' => 'Ube Bites Premix',
            'size' => 'Kgs',
            'quantity' => '15',
            'cost' => '215.55'
        ],

        [  
            'premixName' => 'Ube Bread Premix',
            'size' => 'Kgs',
            'quantity' => '20',
            'cost' => '268.11'
        ],
        
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach($this->premixes as $premixes) {
            Premix::create($premixes);
        }
 
    }
}

