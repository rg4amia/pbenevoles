<?php

namespace Database\Seeders;

use App\Models\Sexe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sexes = [
            [
                'libelle' => 'MASCULIN',
            ],
            [
                'libelle' => 'FEMININ',
            ]
        ];

        foreach ($sexes as $sex) {
            Sexe::create($sex);
        }
    }
}
