<?php

namespace Database\Seeders;

use App\Models\PremixIngredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PremixIngredientSeeder extends Seeder
{
    protected $premix_ingredients = [
        
        //BURGER BUNS
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 1ST flour,
            'premix' => '1'
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix' => '1'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '3',//yeast,
            'premix'=> '1'
        ],

        //CHEESE BUNS
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 1ST flour,
            'premix' => '2'
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix' => '2'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '2'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '2'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '2'
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '2'
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '78',//yeast,
            'premix'=> '2'
        ],

        [
            'unitQuantity'=> '1200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//cheese,
            'premix'=> '2'        
        ],

        //CINNAMON ROUND
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '76',//flour,
            'premix' => '3'        
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix' => '3'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '7',//skimmilk,
            'premix'=> '3'
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '3'
        ],

        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '57',//margarine
            'premix'=> '3'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '3'
        ],

        //COCO NUGGETS
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '76',//flour,
            'premix' => '4'        
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '2',//baking powder
            'premix'=> '4'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '4'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//vanilla flavor
            'premix'=> '4'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '46',// egg large
            'premix'=> '4'
        ],

        [
            'unitQuantity'=> '5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '22',//grated coconut
            'premix'=> '4'
        ],

        //DANNISH CINNAMON
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '5'        
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix' => '5'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '7',//skimmilk,
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '57',//margarine
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '60',//shortening,
            'premix'=> '5'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '5'
        ],

        //DINNER ROLL
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 1ST flour,
            'premix'=> '6'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '6'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '6'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '6'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '6'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '6'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '6'
        ],

        //LADY FINGER
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 1ST flour,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '7'
        ],
        
        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '7'
        ],

        //MAMON KABABAYAN
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '8'        
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '8'
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '8'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '8'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '8'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '8'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '8'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '8'
        ],
        
        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '8'
        ],

        //mongo bread
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 1ST flour,
            'premix'=> '9'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '9'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '9'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '9'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '9'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '9'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '9'
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '89',//mongo,
            'premix'=> '9'
        ],

        //PANDEROSA
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',// flour,
            'premix'=> '10'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//brown sugar,
            'premix'=> '10'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '10'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '10'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '10'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '10'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '10'
        ],

        [
            'unitQuantity'=> '1200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//cheese,
            'premix'=> '10'        
        ],

        //pandesal
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '76',// all purpose
            'premix'=> '11'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '11'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '11'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '11'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '11'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '11'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '11'
        ],

        //pandesal malunggay
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '76',// all purpose
            'premix'=> '12'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '12'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '12'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '12'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '12'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '12'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '12'
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '5',//malunggay,
            'premix'=> '12'
        ],

        //Raisin Buns
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 1ST flour,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '13'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '67',// raisins
            'premix'=> '13'
        ],
        
        //spanish bread
        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '76',//all purpose
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',// white sugar
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '78',//yeast
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//skimmilk
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '52',//egg yellow color
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//butter
            'premix'=> '14'
        ],
        
        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '14'
        ],

        //spanish filling
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '15'
        ],
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//brown sugar
            'premix'=> '15'
        ],
        
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '7',//skimmilk
            'premix'=> '15'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '27',//margarine
            'premix'=> '15'
        ],
        
        //spanish fill choco
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '16'
        ],
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//brown sugar
            'premix'=> '16'
        ],
        
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '7',//skimmilk
            'premix'=> '16'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '27',//margarine
            'premix'=> '16'
        ],

        [
            'unitQuantity'=> '200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '41',//chocolate
            'premix'=> '16'
        ],

        //spanish fill ube
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//brown sugar
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '7',//skimmilk
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '57',//margarine
            'premix'=> '17'
        ],

        [
            'unitQuantity'=> '200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',//ube
            'premix'=> '17'
        ],

        //special cinnamon
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix'=> '18'        
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '7',//skimmilk,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '27',//margarine
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '18'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '18'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '18'
        ],

        [
            'unitQuantity'=> '5',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '47',// egg large
            'premix'=> '18'
        ],

        //squash pandesal 19
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '76',// all purpose
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '19'
        ],

        //Ube Bites
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',//flour,
            'premix' => '20'        
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '20'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '20'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//vanilla flavor
            'premix'=> '20'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '46', //egg large
            'premix'=> '20'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',//ube
            'premix'=> '20'
        ],

        //Ube Bread
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// flour,
            'premix'=> '21'
        ],
        
        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//white sugar,
            'premix'=> '21'
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '21'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '21'
        ],
        
        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '21'
        ],
        
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '31',//shortening,
            'premix'=> '21'
        ],
        
        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//yeast,
            'premix'=> '21'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',//ube
            'premix'=> '21'
        ],

       //Chocolate Cake Premix = 36 kgs
       [
        'unitQuantity' => '2',
        'unit' => 'kgs',
        'variance' => '0.01',
        'rawMaterial' => '80',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '2',
        'unit' => 'kg',
        'variance' => '0.01',
        'rawMaterial' => '33',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '500',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '13',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '300',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '26',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '250',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '9',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '100',
        'unit' => 'pcs',
        'variance' => '0.01',
        'rawMaterial' => '46',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '7',
        'unit' => 'kgs',
        'variance' => '0.01',
        'rawMaterial' => '49',
        'premix' => '22',
    ],

    [
        'unitQuantity' => '5',
        'unit' => 'kgs',
        'variance' => '0.01',
        'rawMaterial' => '62',
        'premix' => '22',
    ],

//Chocolate Marble Premix = 25 kgs
    [//butter
        'unitQuantity' => '400',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '58',
        'premix' => '23'
    ],

     [//powdered sugar
        'unitQuantity' => '25',
        'unit' => 'pcs',
        'variance' => '0.01',
        'rawMaterial' => '28',
        'premix' => '23'
    ],

    [//eggs
        'unitQuantity' => '25',
        'unit' => 'pcs',
        'variance' => '0.01',
        'rawMaterial' => '47',
        'premix' => '23'
    ],

    [//flour
        'unitQuantity' => '500',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '77',
        'premix' => '23'
    ],

    [//evap milk
        'unitQuantity' => '200',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '63',
        'premix' => '23'
    ],

    [//vanilla ext
        'unitQuantity' => '25',
        'unit' => 'pcs',
        'variance' => '0.01',
        'rawMaterial' => '35',
        'premix' => '23'
    ],

    [//cocoa
        'unitQuantity' => '200',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '72',
        'premix' => '23'
    ],


//Ube Cake Premix = 36 kgs

    [//flour
        'unitQuantity' => '2',
        'unit' =>'kgs',
        'variance' => '0.01',
        'rawMaterial' => '80',
        'premix' => '24'
    ],

    [//sugar
        'unitQuantity' => '2',
        'unit' => 'kgs',
        'variance' => '0.01',
        'rawMaterial' => '33',
        'premix' => '24'
    ],

[//powder
        'unitQuantity' => '500',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '13',
        'premix' => '24'
],

[//salt
        'unitQuantity' => '300',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '26',
        'premix' => '24'
],

[//potassium sorbate
        'unitQuantity' => '250',
        'unit' => 'g',
        'variance' => '0.01',
        'rawMaterial' => '9',
        'premix' => '24'
],

[//egg large
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '24',
],

[//oil
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '24'
],

[//ube
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '38',
'premix' => '24'
],

//Vanilla Cake Premix = 36 kgs

[//flour
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '25',
],

[//sugar
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '25'
],

[//powder
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '25'
],

[//salt
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '25'
],

[//potassium sorbate
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '25'
],

[//egg large
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '25',
],

[//oil
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '25'
],

[//vanilla
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '35',
'premix' => '25'
],

//Yema Cake Premix = 36 kgs

[//flour
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '26'
],

[//sugar
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '26'
],

[//powder
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '26'
],

[//salt
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '26'
],

[//potassium sorbate
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '26'
],

[//egg large
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '26'
],

[//oil
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '26'
],

[//yema
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '90',
'premix' => '26'
],

//Strawberry Shortcake Cake Premix – 36kg
[//flour
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '27'
],

[//sugar
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '27'
],

[//powder
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '27'
],

[//salt
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '27'
],

[//potassium sorbate
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '27',
],

[//egg large
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '27'
],

[//oil
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '27'
],

[//strawberry
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '37',
'premix' => '27'
],

//Chiffon Cake – 20kg
[//flour
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '28'
],

[//sugar
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '28'
],

[//powder
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '28'
],

[//salt
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '28'
],

[//potassium sorbate
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '28'
],

[//egg large
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '28'
],

[//oil
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '28'
],

[//cream of tartar
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '37',
'premix' => '28'
],

//Choco Chiffon Cake – 20kg
[//flour
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '29'
],

[//sugar
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '29'
],

[//powder
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '29'
],

[//salt
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '29'
],

[//potassium sorbate
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '29'
],

[//egg large
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '29'
],

[//oil
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '29'
],

[//cream of tartar
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '37',
'premix' => '29'
],

//Choco Caramel Cake Premix – 36kg
[
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '30'
],

[
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '30'
],

[
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '30'
],

[
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '30'
],

[
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '30'
],

[
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '30'
],

[
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '30'
],

[
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '62',
'premix' => '30'
],

//Mocha Cake Premix – 36 kgs
[
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '80',
'premix' => '31'
],

[
'unitQuantity' => '2',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '33',
'premix' => '31'
],

[
'unitQuantity' => '500',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '13',
'premix' => '31'
],

[
'unitQuantity' => '300',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '26',
'premix' => '31'
],

[
'unitQuantity' => '250',
'unit' => 'g',
'variance' => '0.01',
'rawMaterial' => '9',
'premix' => '31'
],

[
'unitQuantity' => '100',
'unit' => 'pcs',
'variance' => '0.01',
'rawMaterial' => '46',
'premix' => '31'
],

[
'unitQuantity' => '7',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '49',
'premix' => '31'
],

[
'unitQuantity' => '5',
'unit' => 'kgs',
'variance' => '0.01',
'rawMaterial' => '56',
'premix' => '31'
],
//pastries
[
    'unitQuantity'=> '1.5',
    'unit'=> 'kg',
    'variance'=> '0.01',
    'rawMaterial'=> '28',//white sugar
    'premix'=> '32'
],

[
    'unitQuantity'=> '800',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '34',//brown sugar
    'premix'=> '32'
],

[
    'unitQuantity'=> '600',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '7',//skimmilk
    'premix'=> '32'
],

[
    'unitQuantity'=> '1',
    'unit'=> 'kg',
    'variance'=> '0.01',
    'rawMaterial'=> '27',//margarine
    'premix'=> '32'
],

//pasalubong
[
    'unitQuantity'=> '2',
    'unit'=> 'kg',
    'variance'=> '0.01',
    'rawMaterial'=> '24',// 3rd class flour
    'premix'=> '33'
],

[
    'unitQuantity'=> '15',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '2',// baking powder
    'premix'=> '33'
],

[
    'unitQuantity'=> '15',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '26',//salt
    'premix'=> '33'
],

[
    'unitQuantity'=> '15',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '35',//vanilla flavor
    'premix'=> '33'
],

[
    'unitQuantity'=> '25',
    'unit'=> 'pcs',
    'variance'=> '0.01',
    'rawMaterial'=> '46',// egg large
    'premix'=> '33'
],

//hotbakes
[
    'unitQuantity'=> '20',
    'unit'=> 'kg',
    'variance'=> '0.01',
    'rawMaterial'=> '77',//flour,
    'premix' => '34'        
],

[
    'unitQuantity'=> '50',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '13',//baking powder
    'premix'=> '34'
],

[
    'unitQuantity'=> '400',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '26',//salt,
    'premix'=> '34'
],

[
    'unitQuantity'=> '15',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '35',//vanilla flavor
    'premix'=> '34'
],

[
    'unitQuantity'=> '25',
    'unit'=> 'pcs',
    'variance'=> '0.01',
    'rawMaterial'=> '46', //egg large
    'premix'=> '34'
],

[
    'unitQuantity'=> '100',
    'unit'=> 'g',
    'variance'=> '0.01',
    'rawMaterial'=> '12',//ube
    'premix'=> '34'
],

    ];

    

    
    //hot bakes
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        foreach($this->premix_ingredients as $premix_ingredients) {
            PremixIngredient::create($premix_ingredients);
        }
 
    }
}

