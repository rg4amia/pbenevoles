<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use App\Models\District;
use App\Models\DomaineIntervention;
use App\Models\PopulationCible;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\SituationMatrimoniale;
use App\Models\SituationProfessionel;
use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    public function index(){

        // parametre bénévole
        $sexes = Sexe::pluck('libelle','id');
        $situationpros = SituationProfessionel::pluck('libelle','id');
        $situationmatrimonial = SituationMatrimoniale::pluck('libelle','id');
<<<<<<< HEAD
        // $communes = Commune::orderBy('ASC','libelle')->pluck('libelle','id');
        // $regions = Region::orderBy('ASC','libelle')->pluck('libelle','id');
        // $departements = Departement::orderBy('ASC','libelle')->pluck('libelle','id');
        // $district = District::orderBy('ASC','libelle')->pluck('libelle','id');
=======
        $communes = Commune::orderBy('libelle', 'ASC')->pluck('libelle','id');
        $regions = Region::orderBy('libelle', 'ASC')->pluck('libelle','id');
        $departements = Departement::orderBy('libelle', 'ASC')->pluck('libelle','id');
        $district = District::orderBy('libelle', 'ASC')->pluck('libelle','id');

        //paramètre association bénévole
        $domaineinterventions = DomaineIntervention::pluck('libelle','id');
        $populationcibles = PopulationCible::pluck('libelle','id');
>>>>>>> ad5ed93369661b4de8c869f5d4ab00f73d6d8ec7

        return view('accueil',[
            'sexes'                 => $sexes,
            'situationpros'         => $situationpros,
            'situationmatrimonial'  => $situationmatrimonial,
<<<<<<< HEAD
            // 'communes'              => $communes,
            // 'regions'               => $regions,
            // 'departements'          => $departements,
            // 'district'              => $district,
=======
            'communes'              => $communes,
            'regions'               => $regions,
            'departements'          => $departements,
            'district'              => $district,
            'populationcible'       => $populationcibles,
            'domaineinterventions'  => $domaineinterventions,

>>>>>>> ad5ed93369661b4de8c869f5d4ab00f73d6d8ec7
        ]);
    }

    public function store(Request $request) {

    }
}
