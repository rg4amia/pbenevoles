<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = [
            [
                'libelle' => 'District autonome d\'Abidjan',
                'description' => 'Capitale économique'
            ],
            [
                'libelle' => 'District autonome de Yamoussoukro',
                'description' => 'Capitale politique'
            ],
            [
                'libelle' => 'District autonome du Bas-Sassandra',
                'description' => 'Région agricole et portuaire'
            ],
            [
                'libelle' => 'District autonome de la Comoé',
                'description' => 'Région forestière'
            ],
            [
                'libelle' => 'District autonome du Denguélé',
                'description' => 'Région aurifère'
            ],
            [
                'libelle' => 'District autonome du Gôh-Djiboua',
                'description' => 'Région touristique'
            ],
            [
                'libelle' => 'District autonome des Lacs',
                'description' => 'Région lacustre'
            ],
            [
                'libelle' => 'District autonome des LAGUNES',
                'description' => 'Région lagunaire'
            ],
            [
                'libelle' => 'District autonome des Montagnes',
                'description' => 'Région montagneuse'
            ],
            [
                'libelle' => 'District autonome du Haut-Sassandra-Marahoué',
                'description' => 'Région agricole'
            ],
            [
                'libelle' => 'District autonome des Savanes',
                'description' => 'Région septentrionale'
            ],
            [
                'libelle' => 'District autonome de la Vallée-Bandama',
                'description' => 'Région céréalière'
            ],
            [
                'libelle' => 'District autonome du Woroba',
                'description' => 'Région forestière'
            ],
            [
                'libelle' => 'District autonome du Zanzan',
                'description' => 'Région de la chaîne du Zanzan'
            ]
        ];

        foreach ($districts as $key => $district) {
           $district =  District::create($district);
        }
    }
}
