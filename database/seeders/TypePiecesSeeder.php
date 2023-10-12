<?php

namespace Database\Seeders;

use App\Models\TypePiece;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypePiecesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {/*CNI
Attestation d'identité
Passeport
Extrait de Naissance
Autre*/
        $typespieces = [
            [
                'libelle' => 'CNI'
            ],
            [
                'libelle' => 'Attestation d\'identité'
            ],
            [
                'libelle' => 'Passeport'
            ],
            [
                'libelle' => 'Extrait de Naissance'
            ],
            [
            'libelle' => 'Autre'
            ],
            [
                'libelle' => 'Aucun'
            ]
        ];

        foreach ($typespieces as $typespiece) {
            TypePiece::create($typespiece);
        }
    }
}
