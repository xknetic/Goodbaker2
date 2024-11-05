<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    protected $areas = [
        [
            'areaName' => "Loakan"
        ],

        [
            'areaName' => "Mabini"
        ],

        [
            'areaName' => "City Camp"
        ],

        [
            'areaName' => "Rosario"
        ],
        // d ko alam ilalagay dto
    ];
    
    public function run(): void
    {
    //
        foreach($this->areas as $areas) {
            Area::create($areas);
        }

    }
}