<?php

namespace Database\Seeders;

use App\Models\SituationMatrimoniale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituationMatrimonialeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $situationPros = [
            [
                'libelle' => 'Célibataire'
            ],
            [
                'libelle' => 'En concubinage'
            ],
            [
                'libelle' => 'Marié(e)'
            ],
            [
                'libelle' => 'Divorcé'
            ],
            [
                'libelle' => 'Veuf(ve)'
            ]
        ];

        foreach ($situationPros as $item) {
            SituationMatrimoniale::create($item);
        }
    }
}
