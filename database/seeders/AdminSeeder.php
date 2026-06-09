<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Admin::updateOrCreate(
            ['email' => 'anantapoudyal0477@gmail.com'],
            [
                'name' => 'Ananta Poudyal',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
