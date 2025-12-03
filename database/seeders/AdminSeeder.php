<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Monther',
            'email' => 'monther@gmali.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
