<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Formation;   // si tu veux lier à une formation

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        // ── Optionnel : récupérer toutes les formations en mémoire
        $formations = Formation::pluck('id')->toArray();   // []

        $profData = [
            ['nom'=>'Alaoui',     'prenom'=>'Youssef',  'email'=>'y.alaoui@epg.ma'],
            ['nom'=>'Benali',     'prenom'=>'Sara',     'email'=>'s.benali@epg.ma'],
            ['nom'=>'El Kadiri',  'prenom'=>'Kamila',   'email'=>'k.kadiri@epg.ma'],
            ['nom'=>'Naciri',     'prenom'=>'Omar',     'email'=>'o.naciri@epg.ma'],
            ['nom'=>'Bouzaid',    'prenom'=>'Hicham',   'email'=>'h.bouzaid@epg.ma'],
        ];

        foreach ($profData as $data) {
            User::create([
                'nom'          => $data['nom'],
                'prenom'       => $data['prenom'],
                'email'        => $data['email'],
                'password'     => Hash::make('password'),   // mot de passe = password
                'role'         => 'enseignant',
                'avatar'       => null,
                // 'formation_id' => empty($formations) ? null : $formations[array_rand($formations)],
                'formation_id' => null,
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
