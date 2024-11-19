<?php

namespace Database\Seeders;

use App\Models\SaleType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $saleTypes = [
        [
            'saleTypeName' => "Extract"
        ],

        [
            'saleTypeName' => "Wholesale"
        ],
    ];
    
    public function run(): void
    {
    //
        foreach($this->saleTypes as $type) {
            SaleType::create($type);
        }

    }
}
