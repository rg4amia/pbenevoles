<?php

namespace Database\Seeders;

use App\Models\Nationalite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationnalite = [
            [
                'libelle' => 'Ivoirienne',
            ],[
                'libelle' => 'Non ivoirienne',
            ]
        ];

        foreach ($nationnalite as $item) {
            Nationalite::create($item);
        }
    }
}
