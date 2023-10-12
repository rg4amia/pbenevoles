<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Departement;
use App\Models\District;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\SituationMatrimoniale;
use App\Models\SituationProfessionel;
use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    public function index(){

        $sexes = Sexe::pluck('libelle','id');
        $situationpros = SituationProfessionel::pluck('libelle','id');
        $situationmatrimonial = SituationMatrimoniale::pluck('libelle','id');
        $communes = Commune::orderBy('ASC','libelle')->pluck('libelle','id');
        $regions = Region::orderBy('ASC','libelle')->pluck('libelle','id');
        $departements = Departement::orderBy('ASC','libelle')->pluck('libelle','id');
        $district = District::orderBy('ASC','libelle')->pluck('libelle','id');

        return view('accueil',[
            'sexes'                 => $sexes,
            'situationpros'         => $situationpros,
            'situationmatrimonial'  => $situationmatrimonial,
            'communes'              => $communes,
            'regions'               => $regions,
            'departements'          => $departements,
            'district'              => $district,
        ]);
    }

    public function store(Request $request) {

    }
}
