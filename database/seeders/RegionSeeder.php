<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'libelle' => 'ABIDJAN',
                'district_id' => 1
            ],
            [
                'libelle' => 'YAMOUSSOUKRO',
                'district_id' => 2
            ],
            [
                'libelle' => 'REGION DE SAN-PEDRO',
                'district_id' => 3
            ],
            [
                'libelle' => 'REGION DE GBÔKLÉ',
                'district_id' => 3
            ],
            [
                'libelle' => 'REGION DE LA NAWA',
                'district_id' => 3
            ],
            [
                'libelle' => 'REGION INDENIÉ DJUABLIN',
                'district_id' => 4
            ],
            [
                'libelle' => 'REGION DU SUD-COMOÉ',
                'district_id' => 4
            ],
            [
                'libelle' => 'REGION KABADOUGOU',
                'district_id' => 5
            ],
            [
                'libelle' => 'REGION FOLON',
                'district_id' => 5
            ],
            [
                'libelle' => 'REGION DU GOH',
                'district_id' => 6
            ],
            [
                'libelle' => 'REGION DU LOH-DJIBOUA',
                'district_id' => 6
            ],
            [
                'libelle' => 'REGION DU BELIER',
                'district_id' => 7
            ],
            [
                'libelle' => 'REGION DE L\' IFFOU',
                'district_id' => 7
            ],
            [
                'libelle' => 'REGION DU MORONOU',
                'district_id' => 7
            ],
            [
                'libelle' => 'REGION DU N\'ZI',
                'district_id' => 7
            ],
            [
                'libelle' => 'REGION AGNÉBY TIASSA',
                'district_id' => 8
            ],
            [
                'libelle' => 'REGION DES GRANDS-PONTS',
                'district_id' => 8
            ],
            [
                'libelle' => 'REGION DE LA ME',
                'district_id' => 8
            ],
            [
                'libelle' => 'REGION DU TONKPI',
                'district_id' => 9
            ],
            [
                'libelle' => 'REGION DU CAVALLY',
                'district_id' => 9
            ],
            [
                'libelle' => 'REGION DU GUÉMON',
                'district_id' => 9
            ],
            [
                'libelle' => 'REGION DU HAUT SASSANDRA',
                'district_id' => 10
            ],
            [
                'libelle' => 'REGION DE LA MARAHOUÉ',
                'district_id' => 10
            ],
            [
                'libelle' => 'REGION DU PORO',
                'district_id' => 11
            ],
            [
                'libelle' => 'REGION DE LA BAGOUÉ',
                'district_id' => 11
            ],
            [
                'libelle' => 'REGION DU TCHOLOGO',
                'district_id' => 11
            ],
            [
                'libelle' => 'REGION DU GBÊKÊ',
                'district_id' => 12
            ],
            [
                'libelle' => 'REGION DU HAMBOL',
                'district_id' => 12
            ],
            [
                'libelle' => 'REGION DU WORODOUGOU',
                'district_id' => 13
            ],
            [
                'libelle' => 'REGION DU BÉRÉ',
                'district_id' => 13
            ],
            [
                'libelle' => 'REGION DU BAFING',
                'district_id' => 13
            ],
            [
                'libelle' => 'REGION DU GONTOUGO',
                'district_id' => 14
            ],
            [
                'libelle' => 'REGION DU BOUNKANI',
                'district_id' => 14
            ],
        ];

        foreach ($regions as $item) {
            Region::create($item);
        }
    }
}
