<?php

namespace Database\Seeders;

use App\Models\SituationProfessionel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituationProfessionelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situationprofessionels = [
            [
                'libelle' => 'Travailleur'
            ], [
                'libelle' => 'Sans emploi'
            ],
            [
                'libelle' => 'Etudiant'
            ],
            [
                'libelle' => 'Elève'
            ],
        ];

        foreach ($situationprofessionels as $situationprofessionel) {
            SituationProfessionel::create($situationprofessionel);
        }
    }
}
