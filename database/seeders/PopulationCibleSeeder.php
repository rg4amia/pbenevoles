<?php

namespace Database\Seeders;

use App\Models\DomaineIntervention;
use App\Models\PopulationCible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopulationCibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'libelle' => 'Population générale'
            ],
            [
                'libelle' => 'Hommes'
            ],
            [
                'libelle' => 'Femmes'
            ],
            [
                'libelle' => 'Jeunes'
            ],
            [
                'libelle' => 'Personnes âgées'
            ],
            [
                'libelle' => 'Personnes vivant avec un handicap'
            ],
            [
                'libelle' => 'Autre'
            ],
        ];

        foreach ($data as $datum) {
            PopulationCible::create($datum);
        }
    }
}
