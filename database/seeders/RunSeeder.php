<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            AreaSeeder::class,
            BranchSeeder::class,
            SupplierSeeder::class,
            RawMaterialSeeder::class,
            RawMaterialUnitSeeder::class,
            ProductCategorySeeder::class,
            PremixSeeder::class,
            ProductSeeder::class,
            ProductPriceSeeder::class,
        ]);
    }
}
