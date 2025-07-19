<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nom' => 'Admin',
            'email' => 'admin@epg.com',
            'password' => Hash::make('admin123'), // ✅ utilise 'password' et non 'mot_de_passe'
            'role' => 'admin',
        ]);
    }
}
