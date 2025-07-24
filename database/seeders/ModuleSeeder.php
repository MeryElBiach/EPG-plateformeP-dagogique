<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        /* Vider la table modules */
        Module::query()->delete();

        /* Formations indexées par nom */
        $formations = Formation::all()->keyBy('nom');

        /* Professeurs (id) */
        $devTeacher     = 7;   // ← nouveau responsable “Dév”
        $networkTeacher = 2;
        $cyberTeacher   = 3;
        $dbTeacher      = 5;
        $projectTeacher = 6;
        $officeTeacher  = 4;   // exemple : bureautique

        /* Modules par formation, TOUTES les lignes ont un enseignant_id */
        $modulesByFormation = [
            /* ─ Qualification ─ */
            'Qualification' => [
                ['nom'=>'Pack Office',          'elements'=>"- Excel 2\n- Word avancé",            'enseignant'=>$officeTeacher],
                ['nom'=>'Gestion de Projet',    'elements'=>"- Gantt\n- Estimation charges",      'enseignant'=>$projectTeacher],
                ['nom'=>'Bases de Données',     'elements'=>"- SQL\n- MERISE",                    'enseignant'=>$dbTeacher],
                ['nom'=>'Réseaux Informatiques','elements'=>"- OSI\n- TCP/IP",                    'enseignant'=>$networkTeacher],
                ['nom'=>'Sécurité Réseaux',     'elements'=>"- VPN\n- Pare‑feu",                  'enseignant'=>$networkTeacher],
            ],

            /* ─ Technicien ─ */
            'Technicien' => [
                ['nom'=>'Développement Web',    'elements'=>"- HTML, CSS, JS\n- Bootstrap",        'enseignant'=>$devTeacher],
                ['nom'=>'Front‑end JS',         'elements'=>"- ReactJS\n- VueJS",                  'enseignant'=>$devTeacher],
                ['nom'=>'Back‑end PHP',         'elements'=>"- Laravel\n- API REST",               'enseignant'=>$devTeacher],
                ['nom'=>'Développement Mobile', 'elements'=>"- Android\n- React Native",           'enseignant'=>$devTeacher],
                ['nom'=>'MySQL Avancé',         'elements'=>"- Procédures stockées\n- Indexation", 'enseignant'=>$dbTeacher],
            ],

            /* ─ Technicien Spécialisé ─ */
            'Technicien Spécialisé' => [
                ['nom'=>'Cybersécurité',        'elements'=>"- Vulnérabilités\n- ISO 27001",       'enseignant'=>$cyberTeacher],
                ['nom'=>'Hacking Éthique',      'elements'=>"- Kali Linux\n- Pentesting 1",        'enseignant'=>$cyberTeacher],
                ['nom'=>'Sécurité Réseaux',     'elements'=>"- VPN\n- Pare‑feu",                  'enseignant'=>$networkTeacher],
                ['nom'=>'Gestion de Projet',    'elements'=>"- Gantt\n- Agile",                   'enseignant'=>$projectTeacher],
                ['nom'=>'Bases de Données',     'elements'=>"- SQL\n- MERISE",                    'enseignant'=>$dbTeacher],
            ],

            /* ─ Technicien Supérieur ─ */
            'Technicien Supérieur' => [
                ['nom'=>'Réseaux Informatiques','elements'=>"- OSI\n- TCP/IP",                    'enseignant'=>$networkTeacher],
                ['nom'=>'Sécurité Réseaux',     'elements'=>"- VPN\n- Pare‑feu",                  'enseignant'=>$networkTeacher],
                ['nom'=>'Développement Web',    'elements'=>"- HTML, CSS, JS",                   'enseignant'=>$devTeacher],
                ['nom'=>'Back‑end PHP',         'elements'=>"- Laravel\n- API REST",              'enseignant'=>$devTeacher],
                ['nom'=>'MySQL Avancé',         'elements'=>"- Procédures stockées",              'enseignant'=>$dbTeacher],
            ],

            /* ─ Licence Professionnelle ─ */
            'Licence Professionnelle' => [
                ['nom'=>'Back‑end PHP',         'elements'=>"- Laravel\n- API REST",              'enseignant'=>$devTeacher],
                ['nom'=>'Front‑end JS',         'elements'=>"- ReactJS\n- VueJS",                 'enseignant'=>$devTeacher],
                ['nom'=>'Mobile',               'elements'=>"- Android\n- React Native",          'enseignant'=>$devTeacher],
                ['nom'=>'Bases de Données',     'elements'=>"- SQL\n- MERISE",                    'enseignant'=>$dbTeacher],
                ['nom'=>'Gestion de Projet',    'elements'=>"- Gantt\n- Méthodes Agile",          'enseignant'=>$projectTeacher],
            ],

            /* ─ Master Professionnel ─ */
            'Master Professionnel' => [
                ['nom'=>'API REST Avancées',    'elements'=>"- JWT\n- OAuth2",                    'enseignant'=>$devTeacher],
                ['nom'=>'Pentesting',           'elements'=>"- OWASP Top 10\n- Kali Linux",       'enseignant'=>$cyberTeacher],
                ['nom'=>'Cloud & DevOps',       'elements'=>"- Docker\n- CI/CD",                  'enseignant'=>$devTeacher],
                ['nom'=>'Big Data',             'elements'=>"- Hadoop\n- Spark",                  'enseignant'=>$dbTeacher],
                ['nom'=>'Projet Stratégique',   'elements'=>"- PMBOK\n- Scaled Agile",            'enseignant'=>$projectTeacher],
            ],
        ];

        /* Création */
        foreach ($modulesByFormation as $formationName => $modules) {
            if (! $formations->has($formationName)) {
                $this->command->warn("Formation « $formationName » introuvable, skip.");
                continue;
            }

            foreach ($modules as $data) {
                Module::create([
                    'nom'           => $data['nom'],
                    'elements'      => $data['elements'],
                    'formation_id'  => $formations[$formationName]->id,
                    'enseignant_id' => $data['enseignant'],
                ]);
            }
        }
    }
}
