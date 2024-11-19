<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'branch',
            'userName' => 'branch',
            'password' => Hash::make('branch12345'),
            'userContact' => '09123456789',
            'email' => 'branch@example.com',
            'creationDate' => now(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('branch');
    }
}
