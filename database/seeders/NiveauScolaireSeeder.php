<?php

namespace Database\Seeders;

use App\Models\NiveauScolaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauScolaireSeeder extends Seeder
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
                'libelle' => 'Cours primaire (CP1 au CP2)'
            ],
            [
                'libelle' => 'Cours élémentaire (CE1 au CE2)'
            ],[
                'libelle' => 'Cours moyen (CM1 au CM2)'
            ],
            [
                'libelle' => 'Secondaire général 1er cycle (6ieme à la 3ieme)'
            ],
            [
                'libelle' => 'Secondaire professionnel 1er cycle'
            ],
            [
                'libelle' => 'Secondaire général 2nd cycle (Seconde à la terminale)'
            ],
            [
                'libelle' => 'Secondaire professionnel 2nd cycle'
            ],
            [
                'libelle' => 'Université / Ecole supérieure'
            ],
            [
                'libelle' => 'Ecole coranique'
            ],
            [
                'libelle' => 'Autre'
            ]
        ];

        foreach ($data as $datum) {
            NiveauScolaire::create($datum);
        }
    }
}
