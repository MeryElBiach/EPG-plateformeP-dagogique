<?php

namespace Database\Seeders;
use App\Models\Utilisateur; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
   public function run(): void
    {
        Utilisateur::create([
            'nom' => 'Admin',
            'email' => 'Lazrak@epg.com',
            'mot_de_passe' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
    }
}
