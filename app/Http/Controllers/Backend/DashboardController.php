<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Benevole;
use App\Models\AssociationBenevole;

use App\Models\District;
use App\Models\Departement;
use App\Models\Region;

class DashboardController extends Controller
{

    public function index(){
        return view('backend.page.dashboard');
    }

    public function dasboard(){
        $totalInscrits = Benevole::count();
        $totalHomme = Benevole::where('sexe_id',1)->count();
        $totalFemme = Benevole::where('sexe_id',2)->count();

        $totalHandicap = Benevole::where('situation_handicap',1)->count();
        $totalNonHandicap = Benevole::where('situation_handicap',2)->count();

        $totalNonAssociation = AssociationBenevole::count();

        $countDistinctRegions = Benevole::select(DB::raw('COUNT(DISTINCT region_id) as libelle'))->get();
        $countDistinctDistricts = Benevole::select(DB::raw('COUNT(DISTINCT district_id) as libelle'))->get();
        $countDistinctDepartement = Benevole::select(DB::raw('COUNT(DISTINCT departement_id) as libelle'))->get();

        $totalIvoirien = Benevole::where('nationalite_id',1)->count();
        $totalNonIvoirien = Benevole::where('nationalite_id',2)->count();
        $totalScolarise = Benevole::where('scolarise',1)->count();
        $totalNonScolarise = Benevole::where('scolarise',2)->count();

        $totalDistricts = District::All();
        $totalDepartements = Departement::All();
        $totalRegions = Region::All();


        return view('backend.page.admin_dash', compact('totalInscrits','totalHomme','totalFemme','totalHandicap','totalNonHandicap','totalNonAssociation','countDistinctRegions','countDistinctDistricts','countDistinctDepartement','totalIvoirien','totalNonIvoirien','totalScolarise','totalNonScolarise','totalDistricts','totalDepartements','totalRegions'));
    }
}
