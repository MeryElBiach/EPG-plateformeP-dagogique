<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        Formation::create([
            'nom' => 'Qualification',
            'description' => 'Formation pour salariés visant à renforcer les compétences métiers. Niveau Collège, durée 2 ans.',
        ]);

        Formation::create([
            'nom' => 'Technicien',
            'description' => 'Formation Bac pour maîtriser des techniques spécialisées. Durée 2 ans.',
        ]);

        Formation::create([
            'nom' => 'Technicien Spécialisé',
            'description' => 'Spécialisation technique post-bac pour insertion professionnelle rapide. Durée 2 ans.',
        ]);

        Formation::create([
            'nom' => 'Technicien Supérieur',
            'description' => 'Formation technique avancée après le bac. Durée 2 ans.',
        ]);

        Formation::create([
            'nom' => 'Licence Professionnelle',
            'description' => 'Formation Bac+2 en 1 an pour répondre aux besoins du marché avec précision.',
        ]);

        Formation::create([
            'nom' => 'Master Professionnel',
            'description' => 'Diplôme de niveau cadre après Bac+3, orienté métier ou recherche. Durée 2 ans.',
        ]);
    }
}
