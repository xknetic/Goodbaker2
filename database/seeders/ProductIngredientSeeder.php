<?php

namespace Database\Seeders;

use App\Models\ProductIngredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductIngredientSeeder extends Seeder
{
    protected $product_ingredients = [
        [//1
            'quantity' => '116',
            'unit'=> 'pcs',
            'product' => '1',
            'rawMaterial'=> '31',
            'premix' => '36',
        ],

        [//2
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '2',
            'rawMaterial'=> '65',
            'premix' => '49',
        ],

        [//3
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '3',
            'rawMaterial'=> '18',
            'premix' => '34',
        ],

        [//4
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '4',
            'rawMaterial'=> '18',
            'premix' => '34',
        ],

        [//5
            'quantity' => '40',
            'unit'=> 'pcs',
            'product' => '5',
            'rawMaterial'=> '15',
            'premix' => '19',
        ],

        [//6
            'quantity' => '40',
            'unit'=> 'pcs',
            'product' => '6',
            'rawMaterial'=> '15',
            'premix' => '32',
        ],

        [//7
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '7',
            'rawMaterial'=> '70',
            'premix' => '33',
        ],

        [//8
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '8',
            'rawMaterial'=> '24',
            'premix' => '15',
        ],

        [//9
            'quantity' => '40',
            'unit'=> 'pcs',
            'product' => '9',
            'rawMaterial'=> '71',
            'premix' => '33',
        ],

        
        [//10
            'quantity' => '40',
            'unit'=> 'pcs',
            'product' => '10',
            'rawMaterial'=> '85',
            'premix' => '33',
        ],

        [//11
            'quantity' => '78',
            'unit'=> 'pcs',
            'product' => '11',
            'rawMaterial'=> '50',
            'premix' => '36',
        ],

        [//12
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '12',
            'rawMaterial'=> '24',
            'premix' => '33',
        ],

        [//13
            'quantity' => '40',
            'unit'=> 'pcs',
            'product' => '13',
            'rawMaterial'=> '5',
            'premix' => '33',
        ],

        [//14
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '14',
            'rawMaterial'=> '71',
            'premix' => '69',
        ],

        [//15
            'quantity' => '53',
            'unit'=> 'pcs',
            'product' => '16',
            'rawMaterial'=> '29',
            'premix' => '59',
        ],

        [//16
            'quantity' => '63',
            'unit'=> 'pcs',
            'product' => '16',
            'rawMaterial'=> '29',
            'premix' => '59',
        ],

        [//17
            'quantity' => '215',
            'unit'=> 'pcs',
            'product' => '17',
            'rawMaterial'=> '28',
            'premix' => '51',
        ],

        [//18
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '18',
            'rawMaterial'=> '74',
            'premix' => '33',
        ],

        [//19
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '19',
            'rawMaterial'=> '74',
            'premix' => '70',
        ],

        
        [//20
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '20',
            'rawMaterial'=> '74',
            'premix' => '70',
        ],

        [//21
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '21',
            'rawMaterial'=> '15',
            'premix' => '58',
        ],

        [//22
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '22',
            'rawMaterial'=> '15',
            'premix' => '58',
        ],

        [//23
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '23',
            'rawMaterial'=> '15',
            'premix' => '71',
        ],

        [//24
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '24',
            'rawMaterial'=> '15',
            'premix' => '37',
        ],

        [//25
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '25',
            'rawMaterial'=> '56',
            'premix' => '4',
        ],

        [//26
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '26',
            'rawMaterial'=> '15',
            'premix' => '3',
        ],

        [//27
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '27',
            'rawMaterial'=> '64',
            'premix' => '3',
        ],

        [//28
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '28',
            'rawMaterial'=> '15',
            'premix' => '38',
        ],

        [//29
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '29',
            'rawMaterial'=> '15',
            'premix' => '39',
        ],

        
        [//30
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '30',
            'rawMaterial'=> '15',
            'premix' => '3',
        ],

        [//31
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '31',
            'rawMaterial'=> '36',
            'premix' => '20',
        ],

        [//32
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '32',
            'rawMaterial'=> '86',
            'premix' => '20',
        ],

        [//33
            'quantity' => '10',
            'unit'=> 'pcs',
            'product' => '33',
            'rawMaterial'=> '73',
            'premix' => '42',
        ],

        [//34
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '34',
            'rawMaterial'=> '71',
            'premix' => '1',
        ],

        [//35
            'quantity' => '30',
            'unit'=> 'pcs',
            'product' => '35',
            'rawMaterial'=> '71',
            'premix' => '1',
        ],

        [//36
            'quantity' => '15',
            'unit'=> 'pcs',
            'product' => '36',
            'rawMaterial'=> '71',
            'premix' => '17',
        ],

        [//37
            'quantity' => '5',
            'unit'=> 'pcs',
            'product' => '37',
            'rawMaterial'=> '28',
            'premix' => '4',
        ],

        [//38
            'quantity' => '10',
            'unit'=> 'pcs',
            'product' => '38',
            'rawMaterial'=> '28',
            'premix' => '4',
        ],

        [//39
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '39',
            'rawMaterial'=> '15',
            'premix' => '33',
        ],

        
        [//40
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '10',
            'rawMaterial'=> '15',
            'premix' => '34',
        ],

        [//41
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '41',
            'rawMaterial'=> '9',
            'premix' => '3',
        ],

        [//42
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '42',
            'rawMaterial'=> '43',
            'premix' => '3',
        ],

        [//43
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '43',
            'rawMaterial'=> '74',
            'premix' => '72',
        ],

        [//44
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '44',
            'rawMaterial'=> '74',
            'premix' => '72',
        ],

        [//45
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '45',
            'rawMaterial'=> '90',
            'premix' => '72',
        ],

        [//46
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '46',
            'rawMaterial'=> '12',
            'premix' => '72',
        ],

        [//47
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '47',
            'rawMaterial'=> '3',
            'premix' => '44',
        ],

        [//48
            'quantity' => '15',
            'unit'=> 'pcs',
            'product' => '48',
            'rawMaterial'=> '71',
            'premix' => '17',
        ],

        [//49
            'quantity' => '108',
            'unit'=> 'pcs',
            'product' => '49',
            'rawMaterial'=> '15',
            'premix' => '48',
        ],

        
        [//50
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '50',
            'rawMaterial'=> '15',
            'premix' => '74',
        ],

        [//51
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '51',
            'rawMaterial'=> '35',
            'premix' => '43',
        ],

        [//52
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '52',
            'rawMaterial'=> '35',
            'premix' => '43',
        ],

        [//53
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '53',
            'rawMaterial'=> '35',
            'premix' => '44',
        ],

        [//54
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '53',
            'rawMaterial'=> '35',
            'premix' => '44',
        ],

        
        [//55
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '53',
            'rawMaterial'=> '35',
            'premix' => '45',
        ],

        [//56
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '53',
            'rawMaterial'=> '35',
            'premix' => '45',
        ],

        [//57
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '57',
            'rawMaterial'=> '35',
            'premix' => '46',
        ],

        [//58
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '58',
            'rawMaterial'=> '35',
            'premix' => '46',
        ],

        [//59
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '59',
            'rawMaterial'=> '15',
            'premix' => '42',
        ],

        
        [//60
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '60',
            'rawMaterial'=> '28',
            'premix' => '6',
        ],

        [//61
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '61',
            'rawMaterial'=> '28',
            'premix' => '6',
        ],

        [//62
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '62',
            'rawMaterial'=> '35',
            'premix' => '50',
        ],

        [//63
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '63',
            'rawMaterial'=> '49',
            'premix' => '33',
        ],

        [//64
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '64',
            'rawMaterial'=> '18',
            'premix' => '55',
        ],

        [//65
            'quantity' => '80',
            'unit'=> 'pcs',
            'product' => '65',
            'rawMaterial'=> '18',
            'premix' => '18',
        ],

        [//66
            'quantity' => '1',
            'unit'=> 'pcs',
            'product' => '66',
            'rawMaterial'=> '15',
            'premix' => '12',
        ],

        [//67
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '67',
            'rawMaterial'=> '35',
            'premix' => '25',
        ],

        [//68
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '68',
            'rawMaterial'=> '34',
            'premix' => '33',
        ],

        [//69
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '69',
            'rawMaterial'=> '15',
            'premix' => '53',
        ],

        
        [//70
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '70',
            'rawMaterial'=> '34',
            'premix' => '51',
        ],

        
        [//71
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '71',
            'rawMaterial'=> '39',
            'premix' => '49',
        ],

        
        [//72
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '72',
            'rawMaterial'=> '15',
            'premix' => '32',
        ],

        
        [
            'quantity' => '20',
            'unit'=> 'pcs',
            'product' => '73',
            'rawMaterial'=> '12',
            'premix' => '32',
        ],

        [
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '74',
            'rawMaterial'=> '74',
            'premix' => '71',
        ],

        [
            'quantity' => '50',
            'unit'=> 'pcs',
            'product' => '75',
            'rawMaterial'=> '15',
            'premix' => '71',
        ],

        [
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '76',
            'rawMaterial'=> '44',
            'premix' => '71',
        ],

        [
            'quantity' => '100',
            'unit'=> 'pcs',
            'product' => '77',
            'rawMaterial'=> '39',
            'premix' => '71',
        ]
    ];
    public function run(): void
    {
        
        foreach($this->product_ingredients as $product_ingredients) {
            ProductIngredient::create($product_ingredients);
        }
 
    }
}
