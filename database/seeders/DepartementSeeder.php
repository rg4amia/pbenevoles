<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = [
            [
                'libelle' => 'ABIDJAN',
                'district_id' => 1,
                'region_id' => 1,
            ],
            [
                'libelle' => 'ATTIÉGOUAKRO',
                'district_id' => 2,
                'region_id' => 2,
            ],
            [
                'libelle' => 'YAMOUSSOUKRO',
                'district_id' => 2,
                'region_id' => 2,
            ],
            [
                'libelle' => 'SAN-PEDRO',
                'district_id' => 3,
                'region_id' => 3,
            ],
            [
                'libelle' => 'TABOU',
                'district_id' => 3,
                'region_id' => 3,
            ],
            [
                'libelle' => 'FRESCO',
                'district_id' => 3,
                'region_id' => 4,
            ],
            [
                'libelle' => 'SASSANDRA',
                'district_id' => 3,
                'region_id' => 4,
            ],
            [
                'libelle' => 'BUYO',
                'district_id' => 3,
                'region_id' => 5,
            ],
            [
                'libelle' => 'GUÉYO',
                'district_id' => 3,
                'region_id' => 5,
            ],
            [
                'libelle' => 'MÉAGUI',
                'district_id' => 3,
                'region_id' => 5,
            ],
            [
                'libelle' => 'SOUBRE',
                'district_id' => 3,
                'region_id' => 5,
            ],
            [
                'libelle' => 'ABENGOUROU',
                'district_id' => 4,
                'region_id' => 6,
            ],
            [
                'libelle' => 'AGNIBILEKROU',
                'district_id' => 4,
                'region_id' => 6,
            ],
            [
                'libelle' => 'BÉTTIÉ',
                'district_id' => 4,
                'region_id' => 6,
            ],
            [
                'libelle' => 'ABOISSO',
                'district_id' => 4,
                'region_id' => 7,
            ],
            [
                'libelle' => 'ADIAKE',
                'district_id' => 4,
                'region_id' => 7,
            ],
            [
                'libelle' => 'GRAND-BASSAM',
                'district_id' => 4,
                'region_id' => 7,
            ],
            [
                'libelle' => 'TIAPOUM',
                'district_id' => 4,
                'region_id' => 7,
            ],
            [
                'libelle' => 'GBELEBAN',
                'district_id' => 5,
                'region_id' => 8,
            ],
            [
                'libelle' => 'MADINANI',
                'district_id' => 5,
                'region_id' => 8,
            ],
            [
                'libelle' => 'ODIENNE',
                'district_id' => 5,
                'region_id' => 8,
            ],
            [
                'libelle' => 'SAMATIGUILA',
                'district_id' => 5,
                'region_id' => 8,
            ],
            [
                'libelle' => 'SEGUELON',
                'district_id' => 5,
                'region_id' => 8,
            ],
            [
                'libelle' => 'KANIASSO',
                'district_id' => 5,
                'region_id' => 9,
            ],
            [
                'libelle' => 'GAGNOA',
                'district_id' => 6,
                'region_id' => 10,
            ],
            [
                'libelle' => 'OUMÉ',
                'district_id' => 6,
                'region_id' => 10,
            ],
            [
                'libelle' => 'DIVO',
                'district_id' => 6,
                'region_id' => 11,
            ],
            [
                'libelle' => 'GUITRY',
                'district_id' => 6,
                'region_id' => 11,
            ],
            [
                'libelle' => 'LAKOTA',
                'district_id' => 6,
                'region_id' => 11,
            ],
            [
                'libelle' => 'DIDIEVI',
                'district_id' => 7,
                'region_id' => 12,
            ],
            [
                'libelle' => 'DJEKANOU',
                'district_id' => 7,
                'region_id' => 12,
            ],
            [
                'libelle' => 'TIEBISSOU',
                'district_id' => 7,
                'region_id' => 12,
            ],
            [
                'libelle' => 'TOUMODI',
                'district_id' => 7,
                'region_id' => 12,
            ],
            [
                'libelle' => 'DAOUKRO',
                'district_id' => 7,
                'region_id' => 13,
            ],
            [
                'libelle' => "M'BAHIAKRO",
                'district_id' => 7,
                'region_id' => 13,
            ],
            [
                'libelle' => "OUELLÉ",
                'district_id' => 7,
                'region_id' => 13,
            ],
            [
                'libelle' => "PRIKRO",
                'district_id' => 7,
                'region_id' => 13,
            ],
            [
                'libelle' => "ARRAH",
                'district_id' => 7,
                'region_id' => 14,
            ],
            [
                'libelle' => "BONGOUANOU",
                'district_id' => 7,
                'region_id' => 14,
            ],
            [
                'libelle' => "M'BATTO",
                'district_id' => 7,
                'region_id' => 14,
            ],
            [
                'libelle' => "BOCANDA",
                'district_id' => 7,
                'region_id' => 15,
            ],
            [
                'libelle' => "DIMBOKRO",
                'district_id' => 7,
                'region_id' => 15,
            ],
            [
                'libelle' => "KOUASSI-KOUASSIKRO",
                'district_id' => 7,
                'region_id' => 15,
            ],
            [
                'libelle' => "KOUASSI-KOUASSIKRO",
                'district_id' => 7,
                'region_id' => 15,
            ],
            [
                'libelle' => "AGBOVILLE",
                'district_id' => 8,
                'region_id' => 16,
            ],
            [
                'libelle' => "SIKENSI",
                'district_id' => 8,
                'region_id' => 16,
            ],
            [
                'libelle' => "TAABO",
                'district_id' => 8,
                'region_id' => 16,
            ],
            [
                'libelle' => "TIASSALÉ",
                'district_id' => 8,
                'region_id' => 16,
            ],
            [
                'libelle' => "DABOU",
                'district_id' => 8,
                'region_id' => 17,
            ],
            [
                'libelle' => "GRAND-LAHOU",
                'district_id' => 8,
                'region_id' => 17,
            ],
            [
                'libelle' => "JACQUEVILLE",
                'district_id' => 8,
                'region_id' => 17,
            ],
            [
                'libelle' => "ADZOPÉ",
                'district_id' => 8,
                'region_id' => 18,
            ],
            [
                'libelle' => "ALEPÉ",
                'district_id' => 8,
                'region_id' => 18,
            ],
            [
                'libelle' => "YAKASSÉ-ATTOBROU",
                'district_id' => 8,
                'region_id' => 18,
            ],
            [
                'libelle' => "BIANKOUMA",
                'district_id' => 9,
                'region_id' => 19,
            ],
            [
                'libelle' => "DANANÉ",
                'district_id' => 9,
                'region_id' => 19,
            ],
            [
                'libelle' => "MAN",
                'district_id' => 9,
                'region_id' => 19,
            ],
            [
                'libelle' => "SIPILOU",
                'district_id' => 9,
                'region_id' => 19,
            ],
            [
                'libelle' => "ZOUA-HOUNIEN",
                'district_id' => 9,
                'region_id' => 19,
            ],
            [
                'libelle' => "BLOLÉQUIN",
                'district_id' => 9,
                'region_id' => 20,
            ],
            [
                'libelle' => "GUIGLO",
                'district_id' => 9,
                'region_id' => 20,
            ],
            [
                'libelle' => "TAÏ",
                'district_id' => 9,
                'region_id' => 20,
            ],
            [
                'libelle' => "TOULEPLEU",
                'district_id' => 9,
                'region_id' => 20,
            ],
            [
                'libelle' => "BANGOLO",
                'district_id' => 9,
                'region_id' => 21,
            ],
            [
                'libelle' => "DUÉKOUÉ",
                'district_id' => 9,
                'region_id' => 21,
            ],
            [
                'libelle' => "FACOBLY",
                'district_id' => 9,
                'region_id' => 21,
            ],
            [
                'libelle' => "KOUIBLY",
                'district_id' => 9,
                'region_id' => 21,
            ],
            [
                'libelle' => "DALOA",
                'district_id' => 10,
                'region_id' => 22,
            ],
            [
                'libelle' => "ISSIA",
                'district_id' => 10,
                'region_id' => 22,
            ],
            [
                'libelle' => "VAVOUA",
                'district_id' => 10,
                'region_id' => 22,
            ],
            [
                'libelle' => "ZOUKOUGBEU",
                'district_id' => 10,
                'region_id' => 22,
            ],
            [
                'libelle' => "BOUAFLÉ",
                'district_id' => 10,
                'region_id' => 23,
            ],
            [
                'libelle' => "SINFRA",
                'district_id' => 10,
                'region_id' => 23,
            ],
            [
                'libelle' => "ZUÉNOULA",
                'district_id' => 10,
                'region_id' => 23,
            ],
            [
                'libelle' => "DIKODOUGOU",
                'district_id' => 11,
                'region_id' => 24,
            ],
            [
                'libelle' => "KORHOGO",
                'district_id' => 11,
                'region_id' => 24,
            ],
            [
                'libelle' => "M'BENGUÉ",
                'district_id' => 11,
                'region_id' => 24,
            ],
            [
                'libelle' => "SINÉMATIALI",
                'district_id' => 11,
                'region_id' => 24,
            ],
            [
                'libelle' => "BOUNDIALI",
                'district_id' => 11,
                'region_id' => 25,
            ],
            [
                'libelle' => "KOUTO",
                'district_id' => 11,
                'region_id' => 25,
            ],
            [
                'libelle' => "TENGRÉLA",
                'district_id' => 11,
                'region_id' => 25,
            ],
            [
                'libelle' => "FERKESSEDOUGOU",
                'district_id' => 11,
                'region_id' => 26,
            ],
            [
                'libelle' => "KONG",
                'district_id' => 11,
                'region_id' => 26,
            ],
            [
                'libelle' => "OUANGOLODOUGOU",
                'district_id' => 11,
                'region_id' => 26,
            ],
            [
                'libelle' => "BÉOUMI",
                'district_id' => 12,
                'region_id' => 27,
            ],
            [
                'libelle' => "BOTRO",
                'district_id' => 12,
                'region_id' => 27,
            ],
            [
                'libelle' => "BOUAKÉ",
                'district_id' => 12,
                'region_id' => 27,
            ],
            [
                'libelle' => "SAKASSOU",
                'district_id' => 12,
                'region_id' => 27,
            ],
            [
                'libelle' => "DABAKALA",
                'district_id' => 12,
                'region_id' => 28,
            ],
            [
                'libelle' => "KATIOLA",
                'district_id' => 12,
                'region_id' => 28,
            ],
            [
                'libelle' => "NIAKARAMADOUGOU",
                'district_id' => 12,
                'region_id' => 28,
            ],
            [
                'libelle' => "KANI",
                'district_id' => 13,
                'region_id' => 29,
            ],
            [
                'libelle' => "SEGUÉLA",
                'district_id' => 13,
                'region_id' => 29,
            ],
            [
                'libelle' => "DIANRA",
                'district_id' => 13,
                'region_id' => 30,
            ],
            [
                'libelle' => "KOUNAHIRI",
                'district_id' => 13,
                'region_id' => 30,
            ],
            [
                'libelle' => "MANKONO",
                'district_id' => 13,
                'region_id' => 30,
            ],
            [
                'libelle' => "KORO",
                'district_id' => 13,
                'region_id' => 31,
            ],
            [
                'libelle' => "OUANINOU",
                'district_id' => 13,
                'region_id' => 31,
            ],
            [
                'libelle' => "TOUBA",
                'district_id' => 13,
                'region_id' => 31,
            ],
            [
                'libelle' => "BONDOUKOU",
                'district_id' => 14,
                'region_id' => 32,
            ],
            [
                'libelle' => "KOUN-FAO",
                'district_id' => 14,
                'region_id' => 32,
            ],
            [
                'libelle' => "SANDÉGUÉ",
                'district_id' => 14,
                'region_id' => 32,
            ],
            [
                'libelle' => "TANDA",
                'district_id' => 14,
                'region_id' => 32,
            ],
            [
                'libelle' => "TRANSUA",
                'district_id' => 14,
                'region_id' => 32,
            ],
            [
                'libelle' => "BOUNA",
                'district_id' => 14,
                'region_id' => 33,
            ],
            [
                'libelle' => "DOROPO",
                'district_id' => 14,
                'region_id' => 33,
            ],
            [
                'libelle' => "NASSIAN",
                'district_id' => 14,
                'region_id' => 33,
            ],
            [
                'libelle' => "TEHINI",
                'district_id' => 14,
                'region_id' => 33,
            ],
        ];

        foreach ($departements as $departement) {
            Departement::create($departement);
        }
    }
}
