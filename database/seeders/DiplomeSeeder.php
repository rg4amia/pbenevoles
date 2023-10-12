<?php

namespace Database\Seeders;

use App\Models\Diplome;
use App\Models\PopulationCible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiplomeSeeder extends Seeder
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
                'libelle' => 'Aucun'
            ],
            [
                'libelle' => 'CEPE'
            ],
            [
                'libelle' => 'CAP/CQP'
            ],
            [
                'libelle' => 'BEPC'
            ],
            [
                'libelle' => 'BP/BEP'
            ],
            [
                'libelle' => 'BAC'
            ],
            [
                'libelle' => 'BTS'
            ],
            [
                'libelle' => 'Licence'
            ],
            [
                'libelle' => 'Master'
            ],
            [
                'libelle' => 'Autre (à préciser)'
            ],
        ];

        foreach ($data as $datum) {
            Diplome::create($datum);
        }
    }
}
