<?php

namespace Database\Seeders;

use App\Models\PremixIngredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PremixIngredientSeeder extends Seeder
{
    protected $premix_ingredients = [
        
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '33'//cream bread
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar,
            'premix' => '33'//cream bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '27',//margarine,
            'premix'=> '33'//cream bread
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '33'//pandesal
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar,
            'premix' => '33'//pandesal
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine,
            'premix'=> '33'//pandesal
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar,
            'premix' => '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine,
            'premix'=> '34'//CINNAMON ROUND(85 pcs)
        ],
        
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '78',//flour,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propiionate,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '60',//margarine,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],

        [
            'unitQuantity'=> '1560',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '49',//cheese,
            'premix'=> '35'//PANDEROSA(78 pcs)
        ],
            //BURGER BUNS(116 packs)  ( 6 pcs per pack)
        [
            'unitQuantity'=> '30',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],

        [
            'unitQuantity'=> '6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],
        
        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propiionate,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],

        [
            'unitQuantity'=> '2.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '36'//BURGER BUNS      (116 packs)  ( 6 pcs per pack)
        ],

        //cakes

        //YEMA 8 X 12   ( 8 pcs)
        [
            'unitQuantity'=> '1400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '37'
        ],

        [
            'unitQuantity'=> '700',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '37'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '2',//baking powder
            'premix'=> '37'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt
            'premix'=> '37'
        ],
        
        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '37'
        ],
        
        [
            'unitQuantity'=> '45',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '37'
        ],
        
        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '25',//oil
            'premix'=> '37'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'tbsp',
            'variance'=> '0.01',
            'rawMaterial'=> '36',// vanilla flavor
            'premix'=> '37'
        ],
        
        [
            'unitQuantity'=> '70',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '41'
        ],

        //WHOLE ROLL - CHOCO     (8 PCS)
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '38'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '38'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '38'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '38'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '38'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '38'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '42',// choco icing
            'premix'=> '38'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '38'
        ],

        //HALF ROLL - CHOCO     (8 PCS)
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '39'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '39'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '39'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '39'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '47',//egg large
            'premix'=> '39'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '39'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '42',// choco icing
            'premix'=> '39'
        ],
        
        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '39'
        ],

        //WHOLE ROLL - YEMA(8 PCS)
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '40'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '40'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '2',//baking powder
            'premix'=> '40'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '40'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '47',//egg large
            'premix'=> '40'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '40'
        ],
        
        [
            'unitQuantity'=> '70',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '41'
        ],

        
        //HALF ROLL - YEMA  (16 PCS)
        
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '41'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '41'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '41'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '41'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '41'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '41'
        ],
        
        [
            'unitQuantity'=> '70',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '41'
        ],

        //PASALUBONG

        //TOASTED MUFFIN
        
        [
            'unitQuantity'=> '1200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '42'
        ],

        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar
            'premix'=> '42'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '2',//baking powder
            'premix'=> '42'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//SALT
            'premix'=> '42'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '42'
        ],
        
        [
            'unitQuantity'=> '40',
            'unit'=> ' pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '43',// egg large
            'premix'=> '42'
        ],

        [
            'unitQuantity'=> '2',
            'unit'=> 'cups',
            'variance'=> '0.01',
            'rawMaterial'=> '62',//oil
            'premix'=> '42'
        ],

        //MERINGUE  (102 pks)  (22 pcs per pack)
        [
            'unitQuantity'=> '2',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '43',// eggwhite
            'premix'=> '43'
        ],

        [
            'unitQuantity'=> '4',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '43'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//vanilla flavor
            'premix'=> '43'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '88',//cream of tartar
            'premix'=> '43'
        ],

        //PACENCIA COOKIES (45 pks)   (70 pcs per pack)
        [
            'unitQuantity'=> '2',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 3rd class flour
            'premix'=> '44'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '2',// baking powder
            'premix'=> '44'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt
            'premix'=> '44'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//vanilla flavor
            'premix'=> '44'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '47',// egg large
            'premix'=> '44'
        ],
        //PILIPIT  (95 pks )   ( 10 pcs per pack)
        [
            'unitQuantity'=> '6000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// first class
            'premix'=> '45'
        ],

        [
            'unitQuantity'=> '6000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// all purpose
            'premix'=> '45'
        ],

        [
            'unitQuantity'=> '2000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '45'
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening
            'premix'=> '45'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',// egg- large
            'premix'=> '45'
        ],

        [
            'unitQuantity'=> '120',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt
            'premix'=> '45'
        ],

        // SESAME COOKIES  (45 pks)   (70 pcs per pack)
        [
            'unitQuantity'=> '2',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '23',// 3rd class flour
            'premix'=> '46'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '46'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt
            'premix'=> '46'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//vanilla flavor
            'premix'=> '46'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',// egg large
            'premix'=> '46'
        ],

        [
            'unitQuantity'=> '500',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '31',// sesame seeds
            'premix'=> '46'
        ],

         //PASTRIES
        //CHEESE ENSAYMADA
        [
            'unitQuantity'=> '2500',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '1000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '4000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// all purpose
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// salt
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '47'//cream bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '47'//cream bread
        ],

        [
            'unitQuantity'=> '10',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '450',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '17',//butter
            'premix'=> '47'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '47'//cream bread
        ],

        [
            'unitQuantity'=> '1200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '49',//cheese,
            'premix'=> '47'//PANDEROSA(78 pcs)
        ],

        //TOASTED ENSAYMADA
        [
            'unitQuantity'=> '2500',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '1000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '4000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// all purpose
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// salt
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '48'//cream bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '48'//cream bread
        ],

        [
            'unitQuantity'=> '8',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '500',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '17',//butter
            'premix'=> '48'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '48'//cream bread
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//CONDENSED MILK,
            'premix'=> '48'//PANDEROSA(78 pcs)
        ],

        //CHEESE BREAD   (194 pcs)
        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',//all purpose
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',// yeast
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//skimmilk
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',// calcium propionate
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '53',//  egg yellow color
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '17',//butter
            'premix'=> '49'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '49'
        ],

        //CHEESE ROLL   (194 pcs)
        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// first class
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',//all purpose
            'premix'=> '50'
        ],
        
        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//  yeast
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//  bread improver
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '33',// skimmilk
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=>'8', //calcium propionate
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '53',// egg yellow color
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '59',// butter
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '50'
        ],

        [
            'unitQuantity'=> '1800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '49',//filled cheese
            'premix'=> '50'
        ],
        //SPANISH BREAD   (215 pcs)
        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',//all purpose
            'premix'=> '51'
        ],
        
        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//skimmilk
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '53',//egg yellow color
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//butter
            'premix'=> '51'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '51'
        ],

        //SPANISH FILLINGS or palaman
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '52'
        ],

        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar
            'premix'=> '52'
        ],

        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk
            'premix'=> '52'
        ],

        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine
            'premix'=> '52'
        ],

        //PANDECOCO   (215 pcs)
        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// first class
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// all purpose
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',// bread improver
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',// skimmilk
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '53',//egg yellow color
            'premix'=> '53'
        ],
        
        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '17',//butter
            'premix'=> '53'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '53'
        ],

        //FILLINGS or palaman
        [
            'unitQuantity'=> '5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '22',//grated coconut
            'premix'=> '54'
        ],

        [
            'unitQuantity'=> '4',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class
            'premix'=> '54'
        ],

        [
            'unitQuantity'=> '4',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar
            'premix'=> '54'
        ],

        [
            'unitQuantity'=> '500',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '54'
        ],

        //CINNAMON TWIST  (375 pcs)
        [
            'unitQuantity'=> '12',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class flour
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '2',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//skimmilk
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=>'26', // salt
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '60',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '60',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//bos
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar
            'premix'=> '55'
        ],

        [
            'unitQuantity'=> '200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder
            'premix'=> '55'
        ],

        //new ingredients

        //CAKE
        //WHOLE ROLL - UBE (8 pcs)
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '56'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '56'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '56'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '56'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '56'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '56'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',// ube paste
            'premix'=> '56'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '64',//evaporated milk
            'premix'=> '56'
        ],

        
        //HALF ROLL - ube(16 PCS)
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '57'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '57'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '57'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '57'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '47',//egg large
            'premix'=> '57'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '57'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',// ube paste
            'premix'=> '57'
        ],
        
        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '64',//condensed milk
            'premix'=> '57'
        ],
        
        //Streamline-Choco 
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '19'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '19'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '72',// choco icing
            'premix'=> '19'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '19'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar,
            'premix' => '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine,
            'premix'=> '58'//Ube Bread
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',// ube paste
            'premix'=> '58'
        ],

        //rasisin bead
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '59'
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar,
            'premix' => '59'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine,
            'premix'=> '59'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '29',// raisins
            'premix'=> '59'
        ],

        //spanish bread(ube)

        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',//all purpose
            'premix'=> '61'
        ],
        
        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//skimmilk
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '53',//egg yellow color
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//butter
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '61'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',// ube paste
            'premix'=> '61'
        ],

        //spanish bread (choco)
        [
            'unitQuantity'=> '4.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',//first class
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '2.8',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '77',//all purpose
            'premix'=> '62'
        ],
        
        [
            'unitQuantity'=> '1.6',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',// white sugar
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '30',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//bread improver
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '33',//skimmilk
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '53',//egg yellow color
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//butter
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '80',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '1',//BOS
            'premix'=> '62'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '63',// choco paste
            'premix'=> '62'
        ],

        //Premium Brownies 
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '78',//cake flour
            'premix'=> '17'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '17'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '73',// choco icing
            'premix'=> '17'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '64',//evap milk
            'premix'=> '17'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//peanuts
            'premix'=> '17'
        ],


        // Brownies
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '78',//flour
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '1'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '1'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '1'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '1'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '72',// choco icing
            'premix'=> '1'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '64',//evap milk
            'premix'=> '1'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '15'//kababayan
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar,
            'premix' => '15'//kababayan
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '15'//kababayan
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine,
            'premix'=> '15'//kababayan
        ],

        //FILLINGS or palaman
        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '28',//white sugar
            'premix'=> '28'
        ],

        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar
            'premix'=> '28'
        ],

        [
            'unitQuantity'=> '600',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk
            'premix'=> '28'
        ],

        [
            'unitQuantity'=> '1',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine
            'premix'=> '28'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '12',// ube paste
            'premix'=> '28'
        ],

        //crinkles
        [
            'unitQuantity'=> '2',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '24',// 3rd class flour
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '2',// baking powder
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',//vanilla flavor
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '25',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '47',// egg large
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '45',// milkbot powder 
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '41',// choco 
            'premix'=> '6'
        ],

        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '49'//cheese bread
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar,
            'premix' => '49'//cheese bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '3',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '35',//brown sugar,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '27',//margarine,
            'premix'=> '49'//cheese bread
        ],

        [
            'unitQuantity'=> '1200',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '49',//cheese,
            'premix'=> '49'//cheese bread
        ],

        //peanut butter
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//peanuts
            'premix'=> '69'
        ],

        [
            'unitQuantity'=> '250',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//butter
            'premix'=> '69'
        ],

        //siopao
        [
             
            'unitQuantity'=> '6000',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '77',// all purpose
            'premix'=> '70'
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar,
            'premix' => '70'//siopao
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '70'//siopao
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '70'//siopao
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '70'//siopao
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '70'//siopao
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '70'//siopao
        ],

        //71
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '71'
        ],


        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '71'
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '71'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '71'
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '71'
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '71'
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '79',//yeast,
            'premix'=> '71'
        ],

        [
            'unitQuantity'=> '180',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '18',//cinnamon powder,
            'premix'=> '71'
        ],


        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '58',//margarine,
            'premix'=> '71'
        ],

        //vanilla chiffon
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '3'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '3'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '36',
            'premix'=> '3'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '3'
        ],

        //choco chiffon
        [
            'unitQuantity'=> '800',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '81',//cake flour
            'premix'=> '4'
        ],

        [
            'unitQuantity'=> '550',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '28',// white sugar
            'premix'=> '4'
        ],

        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '13',//baking powder
            'premix'=> '4'
        ],
        
        [
            'unitQuantity'=> '15',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '9',//potassium sorbate
            'premix'=> '4'
        ],
        
        [
            'unitQuantity'=> '30',
            'unit'=> 'pcs',
            'variance'=> '0.01',
            'rawMaterial'=> '48',//egg large
            'premix'=> '4'
        ],
        
        [
            'unitQuantity'=> '1',
            'unit'=> 'cup',
            'variance'=> '0.01',
            'rawMaterial'=> '50',//oil
            'premix'=> '4'
        ],
        
        [
            'unitQuantity'=> '100',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '72',
            'premix'=> '4'
        ],
        
        [
            'unitQuantity'=> '50',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '20',//condensed milk
            'premix'=> '4'
        ],
        //HOPIA HOPIA HOPIA
        [
            'unitQuantity'=> '20',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '11',//flour,
            'premix' => '72'//cream bread
        ],

        [
            'unitQuantity'=> '3.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '34',//white sugar,
            'premix' => '72'//cream bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '71',//skimmilk,
            'premix'=> '72'//cream bread
        ],

        [
            'unitQuantity'=> '400',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '26',//salt,
            'premix'=> '72'//cream bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '16',//improver,
            'premix'=> '72'//cream bread
        ],

        [
            'unitQuantity'=> '150',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '8',//calcium propionate,
            'premix'=> '72'//cream bread
        ],

        [
            'unitQuantity'=> '1.5',
            'unit'=> 'kg',
            'variance'=> '0.01',
            'rawMaterial'=> '32',//shortening,
            'premix'=> '72'//cream bread
        ],

        [
            'unitQuantity'=> '280',
            'unit'=> 'g',
            'variance'=> '0.01',
            'rawMaterial'=> '37',//yeast,
            'premix'=> '72'
        ],

    ];
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

