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
        $communes = Commune::orderBy('libelle', 'ASC')->pluck('libelle','id');
        $regions = Region::orderBy('libelle', 'ASC')->pluck('libelle','id');
        $departements = Departement::orderBy('libelle', 'ASC')->pluck('libelle','id');
        $district = District::orderBy('libelle', 'ASC')->pluck('libelle','id');

        //paramètre association bénévole
        $domaineinterventions = DomaineIntervention::pluck('libelle','id');
        $populationcibles = PopulationCible::pluck('libelle','id');

        return view('accueil',[
            'sexes'                 => $sexes,
            'situationpros'         => $situationpros,
            'situationmatrimonial'  => $situationmatrimonial,
            'communes'              => $communes,
            'regions'               => $regions,
            'departements'          => $departements,
            'district'              => $district,
            'populationcible'       => $populationcibles,
            'domaineinterventions'  => $domaineinterventions,

        ]);
    }

    public function store(Request $request) {

    }
}
