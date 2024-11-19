<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DriverSeeder extends Seeder
{
    protected $drivers = [
        [
            'driverName' => "Mansueto Paran"
        ],

        [
            'driverName' => "Joseph Maala"
        ],

        [
            'driverName' => "Mark Baltazar"
        ],

        [
            'driverName' => "Ron Santiago"
        ],
    ];
    
    public function run(): void
    {
    //
        foreach($this->drivers as $drivers) {
            Driver::create($drivers);
        }

    }
}
