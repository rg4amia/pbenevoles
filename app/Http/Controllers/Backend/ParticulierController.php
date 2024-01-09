<?php

namespace App\Http\Controllers\Backend;

use App\Exports\BenevoleExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Benevole;
use App\Models\Commune;
use App\Models\Nationalite;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\Beneficiaire;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ParticulierController extends Controller
{
    public function index(Request $request){
        $benevoles = Benevole::with('sexe', 'diplome', 'niveauscolaire', 'situationprofessionnel', 'situationmatrimoniale', 'typepiece', 'nationalite', 'lieuresidence', 'lieunaissance', 'region','departement')->paginate(25);
        $totalBenevoles = Benevole::with('sexe', 'diplome', 'niveauscolaire', 'situationprofessionnel', 'situationmatrimoniale', 'typepiece', 'nationalite', 'lieuresidence', 'lieunaissance', 'region','departement')->count();
        $regions = Region::pluck('libelle','id');
        $sexes = Sexe::pluck('libelle','id');
        $nationalites = Nationalite::pluck('libelle','id');
        $communes = Commune::pluck('libelle','id');

        if ($request->ajax()) {

            //dd($request->all());

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

            $totalBenevoles = Benevole::when($request->region, function ($q) use ($request) {
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
            })->count();

            return view('backend.page.particulier.benevoles', compact('benevoles','totalBenevoles'));
        }

        return view('backend.page.particulier.index', compact('benevoles','regions','sexes','nationalites','communes','totalBenevoles'));
    }

    public function beneficiaire(Request $request){

        //dd(Auth::user()->type,Auth::id());
        if(Auth::user()->type == 1){$user_id = [Auth::id()];}
        elseif(Auth::user()->type == 2){
        $chefs = Beneficiaire::join('users','users.telephone','beneficiaire.telephone')->select('users.id')->where('chefequipe_id',Auth::id())->get();
            //dd($chefs);
            $user_id =[];
              foreach($chefs as $chef){
                 array_push($user_id, $chef->id);
              }
             
        }else{$user_id = [];}
        //dd($user_id);
        $benevoles = Beneficiaire::when($user_id, function ($q) use ($user_id){
                $q->wherein('chefequipe_id',$user_id);
            })->paginate(40);
        $totalBenevoles = Beneficiaire::when($user_id, function ($q) use ($user_id){
                $q->wherein('chefequipe_id',$user_id);
            })->count();
        $regions = Region::pluck('libelle','libelle');
        $sexes = Sexe::pluck('libelle','id');
        $nationalites = Nationalite::pluck('libelle','id');
        $communes = Commune::pluck('libelle','libelle');

        $ob_param=$request->all();
        $page=$request->get('page');
        if($ob_param==[] && $page==''){ 
              Session::forget('ob_param'); 
            }elseif($ob_param && $page==''){
                   Session::put('ob_param', $ob_param);
            }else{
                  $ob_param=Session::get('ob_param');
            }

            $nom = $ob_param['nom'] ?? $request->get('nom');
            $telephone = $ob_param['telephone'] ?? $request->get('telephone');
            $lieuresidence = $ob_param['lieuresidence'] ?? $request->get('lieuresidence');
            $region = $ob_param['region'] ?? $request->get('region');



        if ($request->ajax()) {

            //dd($lieuresidence,$region);

            $benevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->paginate(40);

            $totalBenevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->count();

            return view('backend.page.particulier.beneficiaire', compact('benevoles','totalBenevoles'));
        }

        return view('backend.page.particulier.index_beneficiaire', compact('benevoles','regions','sexes','nationalites','communes','totalBenevoles'));
    }

    public function reclamation(Request $request){
        $benevoles = Reclamation::with('lieuresidence','beneficiaire')
                                 
                                  ->paginate(30);
        $totalBenevoles = Reclamation::with('lieuresidence','beneficiaire')
                                       
                                       ->count();
        $regions = Region::pluck('libelle','id');
        $sexes = Sexe::pluck('libelle','id');
        $nationalites = Nationalite::pluck('libelle','id');
        $communes = Commune::pluck('libelle','id');

        if ($request->ajax()) {

            //dd($request->all());

            $benevoles = Reclamation::join('beneficiaire','beneficiaire.telephone','reclamation.telephone')
            ->when($request->lieuresidence, function ($q) use ($request){
                $q->where('lieu_residence_id',$request->lieuresidence);
            })->when($request->date_debut && $request->date_fin, function ($q) use ($request){
                $q->whereBetween('created_at', [$request->date_debut.' 00:00:00', $request->date_fin.' 23:59:59']);
            })->when($request->nom, function ($q) use ($request){
                $q->where('nom','like','%'.$request->nom.'%' )->orwhere('telephone','like','%'.$request->nom.'%' );
            })->paginate(25);

            $totalBenevoles = Reclamation::join('beneficiaire','beneficiaire.telephone','reclamation.telephone')
            ->when($request->lieuresidence, function ($q) use ($request){
                $q->where('lieu_residence_id',$request->lieuresidence);
            })->when($request->date_debut && $request->date_fin, function ($q) use ($request){
                $q->whereBetween('created_at', [$request->date_debut.' 00:00:00', $request->date_fin.' 23:59:59']);
            })->when($request->nom, function ($q) use ($request){
                $q->where('nom','like','%'.$request->nom.'%' )->orwhere('telephone','like','%'.$request->nom.'%' );
            })->count();

            return view('backend.page.particulier.reclamation', compact('benevoles','totalBenevoles'));
        }

        return view('backend.page.particulier.index_reclamation', compact('benevoles','regions','sexes','nationalites','communes','totalBenevoles'));
    }

    public function traitement_reclamation($reclamation_id,$state){

        $affected = DB::table('reclamation')->where('id',$reclamation_id)->update(['state' =>$state]);

            return Redirect::back()->with('success','Reclamation modifié avec succès !');
    }

    public function benevoleExportExcel($data){
        //dd($data);
        $response = json_decode($data);
        return Excel::download(new BenevoleExport($response), 'benevole.xlsx');
    }
}
