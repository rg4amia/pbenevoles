<?php

namespace Database\Seeders;

use App\Models\DomaineIntervention;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DomaineInterventionSeeder extends Seeder
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
                'libelle' => 'Education/Formation'
            ],
            [
                'libelle' => 'Santé communautaire'
            ],
            [
                'libelle' => 'Assainissement/Environnement'
            ],
            [
                'libelle' => 'Agriculture'
            ],
            [
                'libelle' => 'Appui aux organisations de base'
            ],
            [
                'libelle' => 'Développement communautaire'
            ],
            [
                'libelle' => 'Promotion des droits humains'
            ],
            [
                'libelle' => 'Autre'
            ],
        ];

        foreach ($data as $datum) {
            DomaineIntervention::create($datum);
        }
    }
}
