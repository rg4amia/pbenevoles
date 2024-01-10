<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\User;
use App\Models\Beneficiaire;
use App\Models\Pointage;
use App\Models\Pointage_benevole;

use App\Helpers\Helper;
use App\Helpers\FileUploader;

use Carbon\Carbon;

class AuthenticateController extends Controller
{

    public function login(){
        return view('backend.page.login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::guard()->attempt(['email' => $request->input('email'),'password' => $request->password,]) ||
                Auth::guard()->attempt(['telephone' => $request->input('email'),'password' => $request->password,])) {
            $request->session()->regenerate();

            return redirect()->intended('admin/beneficiaire');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/particulier');
    }

     public function index(Request $request){

        $utilisateurs = User::paginate(25);
        $totalutilisateur = User::count();
        

        if ($request->ajax()) {

            $utilisateurs = User::when($request->region, function ($q) use ($request) {
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

            $totalutilisateur = User::when($request->region, function ($q) use ($request) {
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

            return view('backend.page.utilisateur.utilisateur', compact('utilisateurs','totalutilisateur'));
        }

        return view('backend.page.utilisateur.index_utilisateur', compact('utilisateurs','totalutilisateur'));

     }

     public function nouvel_utilisateur(){
        
        $communes = Beneficiaire::selectRaw('lieu_residence')
                                            ->groupBy('lieu_residence')
                                            ->orderBy('lieu_residence', 'ASC')
                                            ->get();
        $regions = Beneficiaire::selectRaw('region')
                                            ->groupBy('region')
                                            ->orderBy('region', 'ASC')
                                            ->get();
        $departements = Beneficiaire::selectRaw('departement')
                                            ->groupBy('departement')
                                            ->orderBy('departement', 'ASC')
                                            ->get();

        return view('backend.page.utilisateur.nouvel_utilisateur',compact('regions','departements','communes'));

     }

     public function enregistrer_utilisateur(Request $request){

                $user = new User();
                $user->name = $request->get('nom');
                $user->password = bcrypt($request->get('password'));
                $user->email = $request->get('email');
                $user->type = $request->get('type_utilisateur');
                $user->telephone = $request->get('telephone');
                $user->departement = $request->get('departement');
                $user->region = $request->get('region');
                $user->state = 1;
               
                $response = $user->save();

            return Redirect::back()->with('success',"Utilisateur ajouté avec succès");

     }

     public function enregistrer_affectation_benevole(Request $request){

        //dd($request);
        $checkedValues = $request->get('checkedValues');
        $nb = count($checkedValues);
        $chefequipe = $request->get('chefequipe');

        for ($i=0; $i < $nb; $i++) { 
            
            DB::table('beneficiaire')->where('id',$checkedValues[$i])->update(['chefequipe_id' => $chefequipe,'is_affected' => 2]);

        }
        

        Redirect::back()->with('success',"Affectation ajoutée avec succès");

     }

     public function nommer_utilisateur($id,$state){
        $beneficiaires = Beneficiaire::where('id',$id)->first();
        if($state == 2){$type = 1;}else{$type = 2;}
        
        if($beneficiaires){
            $user = new User();
                $user->name = $beneficiaires->nom;
                $user->password = bcrypt($beneficiaires->telephone);
                $user->email = bcrypt($beneficiaires->telephone);
                $user->type = $type;
                $user->telephone = $beneficiaires->telephone;
                $user->state = 1;
               
                $response = $user->save();

                DB::table('beneficiaire')->where('id',$id)->update(['state' => $state]);


            return Redirect::back()->with('success',"Direction ajoutée avec succès");

        }else{

            return Redirect::back()->with('error',"Une erreur s'est produite, réessayer svp");
        }
        
        

     }

     public function affectation_benevole(Request $request,$id){
        $benevoles = Beneficiaire::where('state',1)->paginate(50);
        $totalBenevoles = Beneficiaire::where('state',1)->count();
        $communes = Beneficiaire::selectRaw('lieu_residence')
                                            ->groupBy('lieu_residence')
                                            ->orderBy('lieu_residence', 'ASC')
                                            ->get();
        $regions = Beneficiaire::selectRaw('region')
                                            ->groupBy('region')
                                            ->orderBy('region', 'ASC')
                                            ->get();
        $departements = Beneficiaire::selectRaw('departement')
                                            ->groupBy('departement')
                                            ->orderBy('departement', 'ASC')
                                            ->get();
        $chefequipe = User::where('id',$id)->first();

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

            $benevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->paginate(50);

            $totalBenevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->count();

            return view('backend.page.particulier.affectation_benevole', compact('benevoles','regions','departements','communes','chefequipe','totalBenevoles'));
        }

        return view('backend.page.particulier.index_affectation_benevole',compact('benevoles','regions','departements','communes','chefequipe','totalBenevoles'));

     }

     public function affectation_chefequipe(Request $request,$id){
        $benevoles = Beneficiaire::where('state',2)->paginate(50);
        $totalBenevoles = Beneficiaire::where('state',2)->count();
        $communes = Beneficiaire::selectRaw('lieu_residence')
                                            ->groupBy('lieu_residence')
                                            ->orderBy('lieu_residence', 'ASC')
                                            ->get();
        $regions = Beneficiaire::selectRaw('region')
                                            ->groupBy('region')
                                            ->orderBy('region', 'ASC')
                                            ->get();
        $departements = Beneficiaire::selectRaw('departement')
                                            ->groupBy('departement')
                                            ->orderBy('departement', 'ASC')
                                            ->get();
        $superviseur = User::where('id',$id)->first();

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

            $benevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->paginate(50);

            $totalBenevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->count();

            return view('backend.page.particulier.affectation_chefequipe', compact('benevoles','regions','departements','communes','superviseur','totalBenevoles'));
        }

        return view('backend.page.particulier.index_affectation_chefequipe',compact('benevoles','regions','departements','communes','superviseur','totalBenevoles'));

     }

     public function index_benevole(Request $request){

        $benevoles = Beneficiaire::where(['state'=>1,'is_affected'=>1])->paginate(50);
        $totalBenevoles = Beneficiaire::where(['state'=>1,'is_affected'=>1])->count();
        $communes = Beneficiaire::selectRaw('lieu_residence')
                                            ->groupBy('lieu_residence')
                                            ->orderBy('lieu_residence', 'ASC')
                                            ->get();
        $regions = Beneficiaire::selectRaw('region')
                                            ->groupBy('region')
                                            ->orderBy('region', 'ASC')
                                            ->get();
        $departements = Beneficiaire::selectRaw('departement')
                                            ->groupBy('departement')
                                            ->orderBy('departement', 'ASC')
                                            ->get();
        $chefequipes = User::where('type',1)->get();

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

            $benevoles = Beneficiaire::where(['state'=>1,'is_affected'=>1])
            ->when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->paginate(50);

            $totalBenevoles = Beneficiaire::where(['state'=>1,'is_affected'=>1])
            ->when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->count();

            return view('backend.page.particulier.benevole', compact('benevoles','regions','departements','communes','chefequipes','totalBenevoles'));
        }

        return view('backend.page.particulier.index_benevole', compact('benevoles','regions','departements','communes','chefequipes','totalBenevoles'));

     }

     public function index_chefequipe(Request $request){

        // if(Auth::user()->type == 2){$benevoles = Beneficiaire::join('users','users.telephone','beneficiaire.telephone')->select('users.id','beneficiaire.nom','users.telephone','beneficiaire.region','beneficiaire.departement','beneficiaire.chefequipe_id','beneficiaire.matricule')->where('chefequipe_id',Auth::id())->paginate(50);}
        if(Auth::user()->type == 2){$user_id = Auth::id();}else{$user_id = null;}
        $benevoles = Beneficiaire::where('state',2)->when($user_id, function ($q) use ($user_id){
                $q->where('chefequipe_id',$user_id);
            })->paginate(50);
        $totalBenevoles = Beneficiaire::where('state',2)->when($user_id, function ($q) use ($user_id){
                $q->where('chefequipe_id',$user_id);
            })->count();
        $communes = Beneficiaire::selectRaw('lieu_residence')
                                            ->groupBy('lieu_residence')
                                            ->orderBy('lieu_residence', 'ASC')
                                            ->get();
        $regions = Beneficiaire::selectRaw('region')
                                            ->groupBy('region')
                                            ->orderBy('region', 'ASC')
                                            ->get();
        $departements = Beneficiaire::selectRaw('departement')
                                            ->groupBy('departement')
                                            ->orderBy('departement', 'ASC')
                                            ->get();
        $superviseurs = User::where('type',2)->get();

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

            $benevoles = Beneficiaire::when($user_id, function ($q) use ($user_id){
                $q->where('chefequipe_id',$user_id);
            })->when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->paginate(50);

            $totalBenevoles = Beneficiaire::when($user_id, function ($q) use ($user_id){
                $q->where('chefequipe_id',$user_id);
            })->when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->count();

            return view('backend.page.utilisateur.chefequipe', compact('benevoles','regions','departements','communes','superviseurs','totalBenevoles'));
        }

        return view('backend.page.utilisateur.index_chefequipe', compact('benevoles','regions','departements','communes','superviseurs','totalBenevoles'));

     }

     public function index_superviseur(Request $request){

        $benevoles = Beneficiaire::where('state',3)->paginate(50);
        $totalBenevoles = Beneficiaire::where('state',3)->count();
        $communes = Beneficiaire::selectRaw('lieu_residence')
                                            ->groupBy('lieu_residence')
                                            ->orderBy('lieu_residence', 'ASC')
                                            ->get();
        $regions = Beneficiaire::selectRaw('region')
                                            ->groupBy('region')
                                            ->orderBy('region', 'ASC')
                                            ->get();
        $departements = Beneficiaire::selectRaw('departement')
                                            ->groupBy('departement')
                                            ->orderBy('departement', 'ASC')
                                            ->get();
        $superviseurs = User::where('state',3)->get();

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

            $benevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->paginate(50);

            $totalBenevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->count();

            return view('backend.page.utilisateur.superviseur', compact('benevoles','regions','departements','communes','superviseurs','totalBenevoles'));
        }

        return view('backend.page.utilisateur.index_superviseur', compact('benevoles','regions','departements','communes','superviseurs','totalBenevoles'));

     }

     public function index_pointage(Request $request){
        if(Auth::user()->type == 1){$user_id = [Auth::id()];}elseif(Auth::user()->type == 2){

            $chefs = Beneficiaire::join('users','users.telephone','beneficiaire.telephone')->select('users.id')->where('chefequipe_id',Auth::id())->get();
            $user_id =[];
              foreach($chefs as $chef){
                 array_push($user_id, $chef->id);
              }

        }else{$user_id = [];}
        
        $pointages = Pointage::when($user_id, function ($q) use ($user_id){
                $q->wherein('author_id',$user_id);
            })->paginate(25);
        $totalpointage = Pointage::when($user_id, function ($q) use ($user_id){
                $q->wherein('author_id',$user_id);
            })->count();
        

        if ($request->ajax()) {

            $pointages = Pointage::when($user_id, function ($q) use ($user_id){
                $q->wherein('author_id',$user_id);
            })->paginate(25);

            $totalpointage = Pointage::when($user_id, function ($q) use ($user_id){
                $q->wherein('author_id',$user_id);
            })->count();

            return view('backend.page.utilisateur.pointage', compact('pointages','totalpointage'));
        }

        return view('backend.page.utilisateur.index_pointage', compact('pointages','totalpointage'));

     }

     public function create_pointage(Request $request,Helper $helper){

                $checkpointage = $helper->checkPointage($request->get('pointage_date'),$request->get('pointage_periode'));
                
                if($checkpointage){

                    return Redirect::route('pointage.remplir',$checkpointage)->with('success',"Pointage déja existant");

                }else{

                    $pointage = new Pointage();
                    $pointage->date = $request->get('pointage_date');
                    $pointage->periode =$request->get('pointage_periode');
                    $pointage->author_id = $request->get('author_id');
                    $pointage->state = 1;
                    $pointage->save();
                    return Redirect::route('pointage.remplir',$pointage->id)->with('success',"Pointage ajouté avec succès");
                } 
     }

     public function remplir_pointage($pointage_id){

        $pointage = Pointage::where('id',$pointage_id)->first();
        $author = User::where('id',$pointage->author_id)->first();
        $user_id = $author->id;
        $benevoles = Beneficiaire::when($user_id, function ($q) use ($user_id){
                $q->where('chefequipe_id',$user_id);
            })->get();
        $totalbenevole = Beneficiaire::when($user_id, function ($q) use ($user_id){
                $q->where('chefequipe_id',$user_id);
            })->count();

        return view('backend.page.utilisateur.remplir_pointage', compact('benevoles','totalbenevole','pointage'));

     }

     public function file_update(Request $request,Helper $helper){
        
        //dd($request);
         
         $today = Carbon::today();
         $fileName = '/POINTAGE/FICHE_POINTAGE' . $request->pointage_id .'.'. $request->fichepointage->extension();
         $fichiePointage = FileUploader::upload($request, 'fichepointage', 'public', str_replace(" ", "_", $fileName));

         $affected = DB::table('pointages')->where('id', $request->pointage_id)->update([
                                                                                         'file_pointage' => $fichiePointage,
                                                                                         'author_file' => Auth::id(),
                                                                                         'file_ceated_date' => $today,
                                                                                     ]);
         //dd($fichiePointage,$affected);
        return Redirect::back()->with('success',"Fiche ajouté avec succès");

     }

     public function save_pointage($benevole_id,$pointage_id,$pointage_ben){
        
        $pointage = new Pointage_benevole();
        $check_pointage = DB::table('pointage_benevoles')
                      ->where(['pointage_id'=>$pointage_id,'benevole_id'=>$benevole_id])->count();
        if($check_pointage == 0){
            $pointage->pointage_id = $pointage_id;
            $pointage->benevole_id = $benevole_id;
            $pointage->pointage = $pointage_ben;
            $pointage->author_id = Auth::user()->id;
            //$pointage->state = 1;
            $pointage->save();
        }else{
            $affected = DB::table('pointage_benevoles')->where(['pointage_id'=> $pointage_id,'benevole_id'=>$benevole_id])->update(['pointage' =>$pointage_ben]);
        }
    

     }








}
