<?php

namespace Database\Seeders;

use App\Models\Premix;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PremixSeeder extends Seeder
{

    protected $premixes = [
        [
           'premixName' => 'Brownies-Regular',
           'quantity' => '1',
           'cost' => '316.23'
        ],

        [
            'premixName' => 'Cake Roll-Choco',
            'quantity' => '13',
            'cost' => '210.05'
        ],

        [
            'premixName' => 'Cake Roll-Vanilla',
            'quantity' => '18',
            'cost' => '145.23'
        ],

        [
            'premixName' => 'Chiffon Vanilla',
            'quantity' => '10',
            'cost' => '115.26'
        ],

        [
            'premixName' => 'Chiffon Choco',
            'quantity' => '5',
            'cost' => '170.91'
        ],

        [
            'premixName' => 'Choco Moist Cake',
            'quantity' => '3',
            'cost' => '327.90'
        ],

        [
            'premixName' => 'Crinkles Choco',
            'quantity' => '0',
            'cost' => '374.17'
        ],

        [
            'premixName' => 'Custard - Choco',
            'quantity' => '0',
            'cost' => '170.91'
        ],

        [
            'premixName' => 'Custard-Cake Vanilla',
            'quantity' => '10',
            'cost' => '115.26'
        ],

        [
            'premixName' => 'Egg Pie Crust',
            'quantity' => '3',
            'cost' => '184.31'
        ],

        [
            'premixName' => 'Egg Pie Filling',
            'quantity' => '0',
            'cost' => '429.80'
        ],

        [
            'premixName' => 'Enhanced Banana',
            'quantity' => '3',
            'cost' => '0.00'
        ],

        [
            'premixName' => 'Ensaymada - Reg',
            'quantity' => '7',
            'cost' => '355.96'
        ],

        [
            'premixName' => 'Half - Moon',
            'quantity' => '11',
            'cost' => '170.91'
        ],

        [
            'premixName' => 'Hopia - Crust',
            'quantity' => '14',
            'cost' => '252.98'
        ],

        [
            'premixName' => 'Kababayan',
            'quantity' => '11',
            'cost' => '167.28'
        ],

        [
            'premixName' => 'Pacencia Cookies',
            'quantity' => '4',
            'cost' => '191.43'
        ],

        [
            'premixName' => 'Premium Brownies',
            'quantity' => '1',
            'cost' => '286.53'
        ],

        [
            'premixName' => 'Special Mamon',
            'quantity' => '5',
            'cost' => '120.10'
        ],

        [
            'premixName' => 'Streamline-Choco',
            'quantity' => '5',
            'cost' => '170.91'
        ],

        [
            'premixName' => 'Streamline-Vanilla',
            'quantity' => '10',
            'cost' => '115.26'
        ],

        [
            'premixName' => 'Torta',
            'quantity' => '0',
            'cost' => '108.99'
        ],

        [
            'premixName' => 'P-30',
            'quantity' => '49',
            'cost' => '181.25'
        ],

        [
            'premixName' => 'P-60',
            'quantity' => '29',
            'cost' => '181.25'
        ],

        [
            'premixName' => 'S-32',
            'quantity' => '48',
            'cost' => '170.03'
        ],

        [
            'premixName' => 'Long John',
            'quantity' => '38',
            'cost' => '353.02'
        ],

        [
            'premixName' => 'Cheese Topping',
            'quantity' => '3',
            'cost' => '118.00'
        ],

        [
            'premixName' => 'Spanish Filling',
            'quantity' => '6',
            'cost' => '246.48'
        ],

        [
            'premixName' => 'Ube Filling',
            'quantity' => '26',
            'cost' => '128.00'
        ],

        [
            'premixName' => 'Mongo Filling',
            'quantity' => '69',
            'cost' => '128.00'
        ],

        [
            'premixName' => 'Hopia Filling',
            'quantity' => '25',
            'cost' => '74.00'
        ],

        [
            'premixName' => 'Hopia Pabalat',
            'quantity' => '15',
            'cost' => '68.00'
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

