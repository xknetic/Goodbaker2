<?php

namespace Database\Seeders;

use App\Models\Premix;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PremixSeeder extends Seeder
{

    protected $premixes = [
        [//1
           'premixName' => 'Brownies-Regular',
           'quantity' => '1',
           'cost' => '316.23'
        ],

        [//2
            'premixName' => 'Cake Roll-Choco',
            'quantity' => '13',
            'cost' => '210.05'
        ],

        [//3
            'premixName' => 'Chiffon Vanilla',
            'quantity' => '10',
            'cost' => '115.26'
        ],

        [//4
            'premixName' => 'Chiffon Choco',
            'quantity' => '5',
            'cost' => '170.91'
        ],

        [//5
            'premixName' => 'Choco Moist Cake',
            'quantity' => '3',
            'cost' => '327.90'
        ],

        [//6
            'premixName' => 'Crinkles Choco',
            'quantity' => '0',
            'cost' => '374.17'
        ],

        [//7
            'premixName' => 'Custard - Choco',
            'quantity' => '0',
            'cost' => '170.91'
        ],

        [//8
            'premixName' => 'Custard-Cake Vanilla',
            'quantity' => '10',
            'cost' => '115.26'
        ],

        [//9
            'premixName' => 'Egg Pie Crust',
            'quantity' => '3',
            'cost' => '184.31'
        ],

        [//10
            'premixName' => 'Egg Pie Filling',
            'quantity' => '0',
            'cost' => '429.80'
        ],

        [//11
            'premixName' => 'Enhanced Banana',
            'quantity' => '3',
            'cost' => '0.00'
        ],

        [//12
            'premixName' => 'Ensaymada - Reg',
            'quantity' => '7',
            'cost' => '355.96'
        ],

        [//13
            'premixName' => 'Half - Moon',
            'quantity' => '11',
            'cost' => '170.91'
        ],

        [//14
            'premixName' => 'Hopia - Crust',
            'quantity' => '14',
            'cost' => '252.98'
        ],

        [//15
            'premixName' => 'Kababayan',
            'quantity' => '11',
            'cost' => '167.28'
        ],

        [//16
            'premixName' => 'Pacencia Cookies',
            'quantity' => '4',
            'cost' => '191.43'
        ],

        [//17
            'premixName' => 'Premium Brownies',
            'quantity' => '1',
            'cost' => '286.53'
        ],

        [//18
            'premixName' => 'Special Mamon',
            'quantity' => '5',
            'cost' => '120.10'
        ],

        [//19
            'premixName' => 'Streamline-Choco',
            'quantity' => '5',
            'cost' => '170.91'
        ],

        [//20
            'premixName' => 'Streamline-Vanilla',
            'quantity' => '10',
            'cost' => '115.26'
        ],

        [//21
            'premixName' => 'Torta',
            'quantity' => '0',
            'cost' => '108.99'
        ],

        [//22
            'premixName' => 'P-30',
            'quantity' => '49',
            'cost' => '181.25'
        ],

        [//23
            'premixName' => 'P-60',
            'quantity' => '29',
            'cost' => '181.25'
        ],

        [//24
            'premixName' => 'S-32',
            'quantity' => '48',
            'cost' => '170.03'
        ],

        [//25
            'premixName' => 'Long John',
            'quantity' => '38',
            'cost' => '353.02'
        ],

        [//26
            'premixName' => 'Cheese Topping',
            'quantity' => '3',
            'cost' => '118.00'
        ],

        [//27
            'premixName' => 'Spanish Filling',
            'quantity' => '6',
            'cost' => '246.48'
        ],

        [//28
            'premixName' => 'Ube Filling',
            'quantity' => '26',
            'cost' => '128.00'
        ],

        [//29
            'premixName' => 'Mongo Filling',
            'quantity' => '69',
            'cost' => '128.00'
        ],

        [//30
            'premixName' => 'Hopia Filling',
            'quantity' => '25',
            'cost' => '74.00'
        ],

        [//31
            'premixName' => 'Hopia Pabalat',
            'quantity' => '15',
            'cost' => '68.00'
        ],

        [//32
            'premixName' => 'Cream Bread (100 pcs.)',
            'quantity' => '100',
            'cost' => '4200.00'
        ],

        [//33
            'premixName' => 'Pandesal (8 pcs. per Pack)',
            'quantity' => '143',
            'cost' => '3432.00'
        ],

        [//34
            'premixName' => 'Cinnamon Round (85 pcs.)',
            'quantity' => '85',
            'cost' => '3230.00'
        ],

        [//35
            'premixName' => 'Panderosa (78 pcs.)',
            'quantity' => '78',
            'cost' => '4368.00'
        ],

        [//36   
            'premixName' => 'Burger Buns (6 pcs. per pack)',
            'quantity' => '116',
            'cost' => '3712.00'
        ],

        [//37
            'premixName' => 'Yema Cake 8x12 (8 pcs.)',
            'quantity' => '8',
            'cost' => '3600.00'
        ],

        [//38
            'premixName' => 'Cake Roll-Choco(Whole)',
            'quantity' => '8',
            'cost' => '2520.00'
        ],

        [//39
            'premixName' => 'Cake Roll-Choco(Half)',
            'quantity' => '8',
            'cost' => '1360.00'
        ],

         [//40
            'premixName' => 'Cake Roll-Yema(Whole)',
            'quantity' => '8',
            'cost' => '2520.00'
        ],

        [//41
            'premixName' => 'Cake Roll-Yema(Half)',
            'quantity' => '8',
            'cost' => '1360.00'
        ],

        [//42
            'premixName' => 'Toasted Muffin (12 pcs.)',
            'quantity' => '30',
            'cost' => '13680.00'
        ],

        [//43
            'premixName' => 'Meringue(22 pcs.)',
            'quantity' => '102',
            'cost' => '13680.00'
        ],

        [//44
            'premixName' => 'Pacencia Cookies(70 pcs. per pack)',
            'quantity' => '45',
            'cost' => '100800.00'
        ],

        [//45
            'premixName' => 'Pilipit(10 pcs. per pack)',
            'quantity' => '95',
            'cost' => '30400.00'
        ],

        [//46
            'premixName' => 'Sesame Cookies(10 pcs. per pack)',
            'quantity' => '95',
            'cost' => '30400.00'
        ],
            
        [//47
            'premixName' => 'Cheesy Ensaymada',
            'quantity' => '110',
            'cost' => '1980.00'
        ],

        [//48
            'premixName' => 'Toasted Ensaymada',
            'quantity' => '108',
            'cost' => '1944.00'
        ],

        [//49
            'premixName' => 'Cheese Bread',
            'quantity' => '194',
            'cost' => '0.00'
        ],

        [//50
            'premixName' => 'Cheese Roll',
            'quantity' => '194',
            'cost' => '1746.00'
        ],

        [//51
            'premixName' => 'Spanish Bread',
            'quantity' => '215',
            'cost' => '5160.00'
        ],

        [//52
            'premixName' => 'Spanish Filling',
            'quantity' => '215',
            'cost' => '256.00'
        ],

        [//53
            'premixName' => 'Pandecoco',
            'quantity' => '215',
            'cost' => '0.00'
        ],

        [//54
            'premixName' => 'Pandecoco Filling',
            'quantity' => '215',
            'cost' => '256.00'
        ],

        [//55
            'premixName' => 'Cinnamon Twist',
            'quantity' => '375',
            'cost' => '3375.00'
        ],

        //new products

        // ube cakes
        [//56
            'premixName' => 'Ube Roll Cake (Half)',
            'quantity' => '16',
            'cost' => '2400.00'
        ],

        [//57
            'premixName' => 'Ube Roll Cake (Whole)',
            'quantity' => '8',
            'cost' => '3600.00'
        ],

        //assorted bread
        //ube bread
        [//58
            'premixName' => 'Ube Bread',
            'quantity' => '100',
            'cost' => '4400.00'
        ],

        [//59
            'premixName' => 'Raisin Bread(6 pcs. per pack)',
            'quantity' => '116',
            'cost' => '3712.00'
        ],

        [//60
            'premixName' => 'Special Cinnamon',
            'quantity' => '14',
            'cost' => '658.00'
        ],

        [//61
            'premixName' => 'Spanish Bread (Ube)',
            'quantity' => '215',
            'cost' => '5160.00'
        ],

        [//62
            'premixName' => 'Spanish Bread (Choco)',
            'quantity' => '215',
            'cost' => '5160.00'
        ],

        [//63
            'premixName' => 'Mongo Bread',
            'quantity' => '0',
            'cost' => '0.00'
        ],

        [//65
            'premixName' => 'Dinner Roll',
            'quantity' => '0',
            'cost' => '0.00'
        ],
        
        [//66
            'premixName' => 'Choco Bites',
            'quantity' => '0',
            'cost' => '0.00'
        ],

        [//67
            'premixName' => 'Ube Bites',
            'quantity' => '0',
            'cost' => '0.00'
        ],

        [//68
            'premixName' => 'Cake Roll-Vanilla',
            'quantity' => '18',
            'cost' => '145.23'
        ],

        [//69
            'premixName' => 'Peanut Butter',
            'quantity' => '10',
            'cost' => '565.00'
        ],

        [//70 siopao
            'premixName' => 'Siopao',
            'quantity' => '10',
            'cost' => '2444.00'
        ],

        [//71
            'premixName' => 'Wheat Bread',
            'quantity' => '10',
            'cost' => '2322.00'
        ],

        [//72
            'premixName' => 'Hopia',
            'quantity' => '20',
            'cost' => '0.00'
        ],

        [//73
            'premixName' => 'Nutri-Cookies',
            'quantity' => '20',
            'cost' => '0.00'
        ],

        [//74
            'premixName' => 'Butter Toast',
            'quantity' => '20',
            'cost' => '0.00'
        ],

        [//74
            'premixName' => 'Butter Toast',
            'quantity' => '20',
            'cost' => '0.00'
        ]

       
        


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

