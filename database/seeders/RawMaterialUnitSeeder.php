<?php

namespace Database\Seeders;

use App\Models\RawMaterialUnit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RawMaterialUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $rawMaterialUnits = [
    
        //rm 1
        [
            'rawMaterial' => '1',
            'unit' => 'Kgs',
            'price' => '2430.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '1',
            'unit' => 'Kg',
            'price' => '135.00',
            'stock' => 0
        ],

        //rm 2
        [
            'rawMaterial' => '2',
            'unit' => 'Kgs',
            'price' => '1350.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '2',
            'unit' => 'Kg',
            'price' => '90.00',
            'stock' => 0
        ],

        //rm 3
        [
            'rawMaterial' => '3',
            'unit' => 'Kgs',
            'price' => '1700.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '3',
            'unit' => 'Kg',
            'price' => '85.00',
            'stock' => 0
        ],

        //rm 4
        [
            'rawMaterial' => '4',
            'unit' => 'Bots',
            'price' => '990.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '4',
            'unit' => 'Bot',
            'price' => '165.00',
            'stock' => 0
        ],

        //rm 5
        [
            'rawMaterial' => '5',
            'unit' => 'Kgs',
            'price' => '2750.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '5',
            'unit' => 'Kg',
            'price' => '550.00',
            'stock' => 0
        ],

        //rm 6
        [
            'rawMaterial' => '6',
            'unit' => 'Kgs',
            'price' => '3500.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '6',
            'unit' => 'Kg',
            'price' => '350.00',
            'stock' => 0
        ],

        //rm 7
        [
            'rawMaterial' => '7',
            'unit' => 'Kgs',
            'price' => '5000.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '7',
            'unit' => 'Kg',
            'price' => '200.00',
            'stock' => 0
        ],

        //rm 8
        [
            'rawMaterial' => '8',
            'unit' => 'Kgs',
            'price' => '4875.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '8',
            'unit' => 'Kg',
            'price' => '195.00',
            'stock' => 0
        ],

        //rm 9
        [
            'rawMaterial' => '9',
            'unit' => 'Kgs',
            'price' => '6250.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '9',
            'unit' => 'Kg',
            'price' => '250.00',
            'stock' => 0
        ],

        //rm 10
        [
            'rawMaterial' => '10',
            'unit' => 'Kgs',
            'price' => '5250.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '10',
            'unit' => 'Kg',
            'price' => '210.00',
            'stock' => 0
        ],

        //rm 10
        [
            'rawMaterial' => '10',
            'unit' => 'Kgs',
            'price' => '5250.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '10',
            'unit' => 'Kg',
            'price' => '210.00',
            'stock' => 0
        ],

        //rm 11
        [
            'rawMaterial' => '11',
            'unit' => 'Kgs',
            'price' => '890.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '11',
            'unit' => 'Kg',
            'price' => '35.60',
            'stock' => 0
        ],

        //rm 11
        [
            'rawMaterial' => '11',
            'unit' => 'Kgs',
            'price' => '890.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '11',
            'unit' => 'Kg',
            'price' => '35.60',
            'stock' => 0
        ],

        //rm 11
        [
            'rawMaterial' => '12',
            'unit' => 'Kgs',
            'price' => '14436.50',
            'stock' => 0
        ],

        [
            'rawMaterial' => '12',
            'unit' => '2 Kgs',
            'price' => '902.30',
            'stock' => 0
        ],

        [
            'rawMaterial' => '12',
            'unit' => '1000 g',
            'price' => '451.10',
            'stock' => 0
        ],
        //rm13

        [
            'rawMaterial' => '13',
            'unit' => 'Kgs',
            'price' => '860.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '13',
            'unit' => 'Kgs',
            'price' => '57.33',
            'stock' => 0
        ],

        //rm14
        [
            'rawMaterial' => '14',
            'unit' => 'Kgs',
            'price' => '800.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '14',
            'unit' => 'Kg',
            'price' => '32.00',
            'stock' => 0
        ],

        //rm15
        [
            'rawMaterial' => '15',
            'unit' => 'Pcs',
            'price' => '800.00',
            'stock' => 0
        ],


        [
            'rawMaterial' => '15',
            'unit' => 'Pcs',
            'price' => '8.50',
            'stock' => 0
        ],

        //rm16
        [
            'rawMaterial' => '16',
            'unit' => 'Kgs',
            'price' => '1220.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '16',
            'unit' => '500 g',
            'price' => '61.00',
            'stock' => 0
        ],

        //rm17
        [
            'rawMaterial' => '17',
            'unit' => 'Case',
            'price' => '1650.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '17',
            'unit' => '225g',
            'price' => '45.83',
            'stock' => 0
        ],

        //rm18
        [
            'rawMaterial' => '18',
            'unit' => 'Kgs',
            'price' => '13500.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '18',
            'unit' => 'Kg',
            'price' => '450.00',
            'stock' => 0
        ],

        //rm19
        [
            'rawMaterial' => '19',
            'unit' => 'Kgs',
            'price' => '1020.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '19',
            'unit' => 'Kg',
            'price' => '40.80',
            'stock' => 0
        ],

        //rm20
        [
            'rawMaterial' => '20',
            'unit' => 'Case',
            'price' => '2510.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '20',
            'unit' => 'Kg',
            'price' => '104.58',
            'stock' => 0
        ],

        //rm21
        [
            'rawMaterial' => '21',
            'unit' => 'Kgs',
            'price' => '500.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '21',
            'unit' => 'Kg',
            'price' => '50.00',
            'stock' => 0
        ],

        //rm22
        [
            'rawMaterial' => '22',
            'unit' => 'Kgs',
            'price' => '1950.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '22',
            'unit' => 'Kg',
            'price' => '39.00',
            'stock' => 0
        ],

        //rm23
        [
            'rawMaterial' => '23',
            'unit' => 'Kgs',
            'price' => '905.00',
            'stock' => 0
        ],

        //rm24
        [
            'rawMaterial' => '24',
            'unit' => 'Kgs',
            'price' => '1650.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '24',
            'unit' => 'Kg',
            'price' => '69.00',
            'stock' => 0
        ],

        //rm25
        [
            'rawMaterial' => '25',
            'unit' => 'Kgs',
            'price' => '625.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '25',
            'unit' => 'Kg',
            'price' => '75.00',
            'stock' => 0
        ],


        //rm26 IodisedSalt
        [
            'rawMaterial' => '26',
            'unit' => 'Kgs',
            'price' => '350.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '26',
            'unit' => 'Kg',
            'price' => '14.00',
            'stock' => 0
        ],

        //rm27 Margarine,Spring
        [
            'rawMaterial' => '27',
            'unit' => 'Kgs',
            'price' => '2420.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '27',
            'unit' => 'Kg',
            'price' => '53.78',
            'stock' => 0
        ],

        //rm28 Powdered Sugar,peotraco
        [
            'rawMaterial' => '28',
            'unit' => 'Kgs',
            'price' => '3100.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '28',
            'unit' => 'Kg',
            'price' => '140.91',
            'stock' => 0
        ],

        [
            'rawMaterial' => '28',
            'unit' => 'Kg',
            'price' => '64.05',
            'stock' => 0
        ],

        //rm29 Raisins
        [
            'rawMaterial' => '29',
            'unit' => 'Kgs',
            'price' => '720.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '29',
            'unit' => 'Kg',
            'price' => '72.00',
            'stock' => 0
        ],

        //rm30 Sesame Seeds
        [
            'rawMaterial' => '30',
            'unit' => 'Kg',
            'price' => '4020.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '30',
            'unit' => 'Kg',
            'price' => '160.80',
            'stock' => 0
        ],

        //rm31 Shortening,spring
        [
            'rawMaterial' => '31',
            'unit' => 'Kgs',
            'price' => '2140.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '31',
            'unit' => 'Kg',
            'price' => '42.80',
            'stock' => 0
        ],

        //rm32 Skim Milk Brown
        [
            'rawMaterial' => '32',
            'unit' => 'Kg',
            'price' => '1200.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '32',
            'unit' => 'Kg',
            'price' => '48.00',
            'stock' => 0
        ],

        //rm33 Sugar, White
        [
            'rawMaterial' => '33',
            'unit' => 'Kgs',
            'price' => '3530.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '33',
            'unit' => 'Kg',
            'price' => '70.60',
            'stock' => 0
        ],

        //rm34 Sugar, Brown
        [
            'rawMaterial' => '34',
            'unit' => 'Kgs',
            'price' => '3040.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '34',
            'unit' => 'Kg',
            'price' => '60.80',
            'stock' => 0
        ],

        //rm35 Vanilla, Panadero
        [
            'rawMaterial' => '35',
            'unit' => 'Gals',
            'price' => '370.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '35',
            'unit' => 'Gal',
            'price' => '92.50',
            'stock' => 0
        ],

        //rm36 Yeast, Instant Success
        [
            'rawMaterial' => '36',
            'unit' => 'Kgs',
            'price' => '2232.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '36',
            'unit' => 'Kg',
            'price' => '111.60',
            'stock' => 0
        ],

        //rm34 Sugar, Brown
        [
            'rawMaterial' => '34',
            'unit' => 'Kgs',
            'price' => '3040.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '34',
            'unit' => 'Kg',
            'price' => '60.80',
            'stock' => 0
        ],

        //rm35 Vanilla,Panadero
        [
            'rawMaterial' => '35',
            'unit' => 'Gals',
            'price' => '370.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '35',
            'unit' => 'Gals',
            'price' => '92.50',
            'stock' => 0
        ],

        //rm36 Yeast
        [
            'rawMaterial' => '36',
            'unit' => 'Kgs',
            'price' => '2232.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '36',
            'unit' => 'Kg',
            'price' => '111.60',
            'stock' => 0
        ],

        //rm36 Yeast
        [
            'rawMaterial' => '36',
            'unit' => 'Kgs',
            'price' => '2232.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '36',
            'unit' => 'Kg',
            'price' => '111.60',
            'stock' => 0
        ],

        //rm37 Apito Strawberry Paste
        [
            'rawMaterial' => '37',
            'unit' => 'Kg',
            'price' => '608.00',
            'stock' => 0
        ],

        //rm38 Apito UBE Paste
        [
            'rawMaterial' => '38',
            'unit' => 'Kgs',
            'price' => '1620.60',
            'stock' => 0
        ],

        [
            'rawMaterial' => '38',
            'unit' => 'Kg',
            'price' => '810.60',
            'stock' => 0
        ],

        //rm39 Apito Pandan Paste
        [
            'rawMaterial' => '39',
            'unit' => 'Kg',
            'price' => '576.60',
            'stock' => 0
        ],

        //rm40 Apito Pandan Paste
        [
            'rawMaterial' => '40',
            'unit' => 'Kg',
            'price' => '576.60',
            'stock' => 0
        ],

        //rm41 White Chocolate Deluxe
        [
            'rawMaterial' => '41',
            'unit' => 'Kg',
            'price' => '7320.60',
            'stock' => 0
        ],

        //rm42 Dark Chocolate Deluxe
        [
            'rawMaterial' => '42',
            'unit' => 'kg',
            'price' => '7000.00',
            'stock' => 0
        ],

        //rm43 Medium
        [
            'rawMaterial' => '43',
            'unit' => 'trays',
            'price' => '1800.00',
            'stock' => 0
        ],

        //rm44 farmland milk
        [
            'rawMaterial' => '44',
            'unit' => 'Kgs',
            'price' => '1350.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '44',
            'unit' => 'Kg',
            'price' => '54.00',
            'stock' => 0
        ],

        //rm 45 milkboy
        [
            'rawMaterial' => '45',
            'unit' => 'Kgs',
            'price' => '6900.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '45',
            'unit' => 'Kg',
            'price' => '276.00',
            'stock' => 0
        ],

        //rm 46 hoisin sauce
        [
            'rawMaterial' => '46',
            'unit' => '3 Kgs',
            'price' => '2556.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '46',
            'unit' => 'Gal',
            'price' => '639.00',
            'stock' => 0
        ],

        //rm 47 large gold eggs
        [
            'rawMaterial' => '47',
            'unit' => 'trays',
            'price' => '2880.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '47',
            'unit' => 'tray',
            'price' => '240.00',
            'stock' => 0
        ],

        //rm 48 Xlarge gold eggs
        [
            'rawMaterial' => '48',
            'unit' => 'trays',
            'price' => '3000.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '48',
            'unit' => 'tray',
            'price' => '250.00',
            'stock' => 0
        ],

        //rm 49 magnolia filled cheese
        [
            'rawMaterial' => '49',
            'unit' => 'kgs',
            'price' => '3096.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '49',
            'unit' => 'kgs',
            'price' => '516.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '49',
            'unit' => 'kg',
            'price' => '258.00',
            'stock' => 0
        ],

        //rm 50 marca leon soya oil
        [
            'rawMaterial' => '50',
            'unit' => 'kgs',
            'price' => '1791.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '50',
            'unit' => 'kg',
            'price' => '105.35',
            'stock' => 0
        ],


        //rm 51 neco color orange
        [
            'rawMaterial' => '51',
            'unit' => 'gms',
            'price' => '100.00',
            'stock' => 0
        ],

        //rm 52 neco color red
        [
            'rawMaterial' => '52',
            'unit' => 'gms',
            'price' => '120.00',
            'stock' => 0
        ],

        //rm 53 neco color egg yellow
        [
            'rawMaterial' => '53',
            'unit' => 'gms',
            'price' => '98.34',
            'stock' => 0
        ],

        //rm 54 neco color ube
        [
            'rawMaterial' => '54',
            'unit' => 'gms',
            'price' => '170.00',
            'stock' => 0
        ],

        //rm 55 neco color apple green
        [
            'rawMaterial' => '55',
            'unit' => 'gms',
            'price' => '120.00',
            'stock' => 0
        ],

        //rm 56 neco color choco brown
        [
            'rawMaterial' => '56',
            'unit' => 'gms',
            'price' => '170.00',
            'stock' => 0
        ],

        //rm 57 nescafe inst
        [
            'rawMaterial' => '57',
            'unit' => 'gms',
            'price' => '68.05',
            'stock' => 0
        ],

        //rm 58 buttercreme ref marg
        [
            'rawMaterial' => '58',
            'unit' => 'case',
            'price' => '783.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '58',
            'unit' => 'gms',
            'price' => '32.63',
            'stock' => 0
        ],

        //rm 59 buttercreme 100
        [
            'rawMaterial' => '59',
            'unit' => 'kgs',
            'price' => '1750.00',
            'stock' => 0
        ],

        //rm 60 baker's choice margarine        
        [
            'rawMaterial' => '60',
            'unit' => 'kgs',
            'price' => '2380.63',
            'stock' => 0
        ],

        [
            'rawMaterial' => '60',
            'unit' => 'kg',
            'price' => '59.50',
            'stock' => 0
        ],

        //rm 61 baker's plus shortening        
        [
            'rawMaterial' => '61',
            'unit' => 'kgs',
            'price' => '565.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '61',
            'unit' => 'kg',
            'price' => '56.50',
            'stock' => 0
        ],

        //rm 62 soya oil        
        [
            'rawMaterial' => '62',
            'unit' => 'kgs',
            'price' => '2210.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '62',
            'unit' => 'kg',
            'price' => '130.50',
            'stock' => 0
        ],

        //rm 63 magnifier CHOCO        
        [
            'rawMaterial' => '63',
            'unit' => 'kgs',
            'price' => '770.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '63',
            'unit' => 'kg',
            'price' => '154.00',
            'stock' => 0
        ],

        //rm 64 alaska 370ml        
        [
            'rawMaterial' => '64',
            'unit' => 'cases',
            'price' => '1524.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '64',
            'unit' => 'cas',
            'price' => '31.75',
            'stock' => 0
        ],

        //rm 65 brown paper        
        [
            'rawMaterial' => '65',
            'unit' => 'pcs',
            'price' => '850.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '65',
            'unit' => 'pcs',
            'price' => '8.50',
            'stock' => 0
        ],

        //rm 66 sw soy sauce        
        [
            'rawMaterial' => '66',
            'unit' => '3.78 L',
            'price' => '589.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '66',
            'unit' => '3.78 L',
            'price' => '147.25',
            'stock' => 0
        ],

        //rm 67 rose cane vinegar        
        [
            'rawMaterial' => '67',
            'unit' => '3.78 L',
            'price' => '400.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '67',
            'unit' => '3.78 L',
            'price' => '100.00',
            'stock' => 0
        ],

        //rm 68 raisins        
        [
            'rawMaterial' => '68',
            'unit' => 'kgs',
            'price' => '570.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '68',
            'unit' => 'kg',
            'price' => '71.25',
            'stock' => 0
        ],

        //rm 69 pineapple crushed        
        [
            'rawMaterial' => '69',
            'unit' => '3.033 kgs',
            'price' => '1270.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '69',
            'unit' => 'can',
            'price' => '211.82',
            'stock' => 0
        ],

        //rm 70 air brush colors        
        [
            'rawMaterial' => '70',
            'unit' => 'gms',
            'price' => '205.00',
            'stock' => 0
        ],

        //rm 71 skinless peanuts
        [
            'rawMaterial' => '71',
            'unit' => 'kgs',
            'price' => '2400.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '71',
            'unit' => 'kg',
            'price' => '96.00',
            'stock' => 0
        ],

        //rm 72 favorish light brown gp390-11        
        [
            'rawMaterial' => '72',
            'unit' => 'kgs',
            'price' => '6625.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '72',
            'unit' => 'kg',
            'price' => '265.00',
            'stock' => 0
        ],

        //rm 73 favorish dark black gp990-11        
        [
            'rawMaterial' => '73',
            'unit' => 'kgs',
            'price' => '9125.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '73',
            'unit' => 'kg',
            'price' => '365.00',
            'stock' => 0
        ],

        //rm 74 supplies
        [
            'rawMaterial' => '74',
            'unit' => 'sachet',
            'price' => '612.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '74',
            'unit' => 'piece',
            'price' => '8.50',
            'stock' => 0
        ],

        //rm75 cocoa light
        [
            'rawMaterial' => '75',
            'unit' => 'kgs',
            'price' => '6250.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '75',
            'unit' => 'kg',
            'price' => '250.00',
            'stock' => 0
        ],


       //rm76 bake best platinum bread
        [
            'rawMaterial' => '76',
            'unit' => '500 g',
            'price' => '2475.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '76',
            'unit' => '500 g',
            'price' => '103.13',
            'stock' => 0
        ],

        //rm77
        [
            'rawMaterial' => '77',
            'unit' => 'kgs',
            'price' => '1175.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '77',
            'unit' => 'kg',
            'price' => '47.00',
            'stock' => 0
        ],

        //rm78
        [
            'rawMaterial' => '78',
            'unit' => 'kgs',
            'price' => '930.00',
            'stock' => 0
        ],

        //rm79
        [
            'rawMaterial' => '79',
            'unit' => '500 g',
            'price' => '2524.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '79',
            'unit' => '500 g',
            'price' => '63.11',
            'stock' => 0
        ],

        //rm80
        [
            'rawMaterial' => '80',
            'unit' => 'kgs',
            'price' => '885.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '80',
            'unit' => 'kg',
            'price' => '35.00',
            'stock' => 0
        ],

        //rm81
        [
            'rawMaterial' => '81',
            'unit' => 'kgs',
            'price' => '1105.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '81',
            'unit' => 'kg',
            'price' => '44.00',
            'stock' => 0
        ],

        //rm82
        [
            'rawMaterial' => '82',
            'unit' => 'trays',
            'price' => '2940.00',
            'stock' => 0
        ],

        //rm83
        [
            'rawMaterial' => '83',
            'unit' => 'trays',
            'price' => '2280.00',
            'stock' => 0
        ],

        //rm84
        [
            'rawMaterial' => '84',
            'unit' => 'kgs',
            'price' => '3150.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '84',
            'unit' => 'kg',
            'price' => '315.00',
            'stock' => 0
        ],

        //rm85
        [
            'rawMaterial' => '85',
            'unit' => 'kgs',
            'price' => '3550.00',
            'stock' => 0
        ],

        [
            'rawMaterial' => '85',
            'unit' => 'kg',
            'price' => '355.00',
            'stock' => 0
        ],


    ];

    public function run(): void
    {
        //
        foreach($this->rawMaterialUnits as $rawMaterialUnits) {
            RawMaterialUnit::create($rawMaterialUnits);
        }
 
    }

}
