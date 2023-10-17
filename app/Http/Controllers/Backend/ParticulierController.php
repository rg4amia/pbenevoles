<?php

namespace App\Http\Controllers\Backend;

use App\Exports\BenevoleExport;
use App\Http\Controllers\Controller;
use App\Models\Benevole;
use App\Models\Commune;
use App\Models\Nationalite;
use App\Models\Region;
use App\Models\Sexe;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticulierController extends Controller
{
    public function index(Request $request){
        $benevoles = Benevole::with('sexe', 'diplome', 'niveauscolaire', 'situationprofessionnel', 'situationmatrimoniale', 'typepiece', 'nationalite', 'lieuresidence', 'lieunaissance', 'region','departement')->paginate(25);
        $regions = Region::pluck('libelle','id');
        $sexes = Sexe::pluck('libelle','id');
        $nationalites = Nationalite::pluck('libelle','id');
        $communes = Commune::pluck('libelle','id');

        if ($request->ajax()) {

            $benevoles = Benevole::when($request->region, function ($q) use ($request) {
                $q->where('region_id',$request->region);
            })->when($request->lieuresidence, function ($q) use ($request){
                $q->where('lieu_residence_id',$request->lieuresidence);
            })->when($request->date_debut && $request->date_fin, function ($q) use ($request){
                $q->whereBetween('created_at', [$request->date_debut.' 00:00:00', $request->date_fin.' 23:59:59']);
            })->when($request->nationalite, function ($q) use ($request){
                $q->where('nationalite_id', $request->nationalite);
            })->when($request->sexe, function($q) use ($request) {
                $q->where('sexe_id', $request->sexe);
            })->when($request->scolarise, function ($q) use ($request) {
                $q->where('scolarise', $request->scolarise);
            })->when($request->handicap, function ($q) use ($request) {
                $q->where('situation_handicap', $request->handicap);
            })->paginate(25);

            return view('backend.page.particulier.benevoles', compact('benevoles'));
        }

        return view('backend.page.particulier.index', compact('benevoles','regions','sexes','nationalites','communes'));
    }

    public function benevoleExportExcel($data){
        $response = json_decode($data);
        return Excel::download(new BenevoleExport($response), 'benevole.xlsx');
    }
}
