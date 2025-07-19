<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $modulesByTheme = [
            // Dev Web
            ['nom' => 'Développement Web', 'elements' => "- HTML, CSS, JS\n- Bootstrap & Responsive"],
            ['nom' => 'Front-end JS', 'elements' => "- ReactJS\n- VueJS"],
            ['nom' => 'Back-end PHP', 'elements' => "- Laravel\n- API REST"],

            // Réseau
            ['nom' => 'Réseaux Informatiques', 'elements' => "- Modèle OSI\n- TCP/IP"],
            ['nom' => 'Sécurité Réseaux', 'elements' => "- VPN\n- Pare-feu"],

            // Cybersécurité
            ['nom' => 'Cybersécurité', 'elements' => "- Vulnérabilités\n- ISO 27001"],
            ['nom' => 'Hacking Éthique', 'elements' => "- Kali Linux\n- Pentesting niveau 1"],

            // Mobile
            ['nom' => 'Développement Mobile', 'elements' => "- Android\n- React Native"],

            // BDD
            ['nom' => 'Bases de Données', 'elements' => "- SQL\n- Modélisation MERISE"],
            ['nom' => 'MySQL Avancé', 'elements' => "- Procédures stockées\n- Indexation"],

            // Bureautique
            ['nom' => 'Pack Office', 'elements' => "- Excel niveau 2\n- Word avancé"],

            // Gestion projet
            ['nom' => 'Gestion de Projet', 'elements' => "- Planning Gantt\n- Estimation charges"],
            
        ];
        

        $formations = Formation::all();

        foreach ($formations as $formation) {
            $randomModules = collect($modulesByTheme)->shuffle()->take(5);

            foreach ($randomModules as $moduleData) {
                Module::create([
                    'nom' => $moduleData['nom'],
                    'elements' => $moduleData['elements'],
                    'formation_id' => $formation->id,
                ]);
            }
        }
    }
}
