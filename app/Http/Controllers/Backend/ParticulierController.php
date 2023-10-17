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
    public function index(){
        $benevoles = Benevole::with('sexe', 'diplome', 'niveauscolaire', 'situationprofessionnel', 'situationmatrimoniale', 'typepiece', 'nationalite', 'lieuresidence', 'lieunaissance', 'region','departement')->paginate(25);
        $regions = Region::pluck('libelle','id');
        $sexes = Sexe::pluck('libelle','id');
        $nationalites = Nationalite::pluck('libelle','id');
        $communes = Commune::pluck('libelle','id');
        return view('backend.page.particulier.index', compact('benevoles','regions','sexes','nationalites','communes'));
    }

    public function multiSearch(Request $request){

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
        })->paginate(15);

        $data = array();

        foreach ($benevoles as $benevole) {
            $data [] = [
                'photoidentite' => $benevole->photoidentite,
                'nom' => strtoupper($benevole->nom),
                'prenoms' => strtoupper($benevole->prenoms),
                'telephone' => $benevole->telephone,
                'matricule' => $benevole->matricule,
                'nationalite' => strtoupper($benevole->nationalite->libelle),
                'sexe' => $benevole->sexe->libelle,
                'typepiece' => $benevole->typepiece->libelle,
                'numero_piece' => $benevole->numero_piece,
                'lieuresidence' => $benevole->lieuresidence->libelle,
                'region' => $benevole->region->libelle,
                'departement' => $benevole->departement->libelle,
                'scolarise' => $benevole->scolarise,
                'niveauscolaire' => @$benevole->niveauscolaire->libelle,
                'diplome' => @$benevole->diplome->libelle,
                'preciser_autre_diplome' => @$benevole->preciser_autre_diplome,
                'situationprofessionnel' => strtoupper($benevole->situationprofessionnel->libelle) ,
            ];
        }

        return response()->json($data);
    }

    public function benevoleExportExcel(){
        return Excel::download(new BenevoleExport(), 'benevole.xlsx');
    }
}
