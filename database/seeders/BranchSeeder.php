<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    protected $branches = [
        [
            'branchName' => "Loakan"
        ],

        [
            'branchName' => "Mabini"
        ],

        [
            'branchName' => "City Camp"
        ],

        [
            'branchName' => "Rosario"
        ],
    ];
    
    public function run(): void
    {
    //
        foreach($this->branches as $branches) {
            Branch::create($branches);
        }

    }
}