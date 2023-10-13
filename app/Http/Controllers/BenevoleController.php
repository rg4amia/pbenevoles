<?php

namespace App\Http\Controllers;

use App\Models\Benevole;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Diplome;
use App\Models\District;
use App\Models\DomaineIntervention;
use App\Models\Nationalite;
use App\Models\NiveauScolaire;
use App\Models\PopulationCible;
use App\Models\Region;
use App\Models\Sexe;
use App\Models\SituationMatrimoniale;
use App\Models\SituationProfessionel;
use App\Models\TypePiece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BenevoleController extends Controller
{
    public function index()
    {
        // parametre bénévole
        $sexes = Sexe::pluck('libelle', 'id');
        $situationpros = SituationProfessionel::pluck('libelle', 'id');
        $situationmatrimonial = SituationMatrimoniale::pluck('libelle', 'id');

        $communes = Commune::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $regions = Region::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $departements = Departement::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $districts = District::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $nationnalites = Nationalite::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $niveauscolaires = NiveauScolaire::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $diplomes = Diplome::orderBy('libelle', 'ASC')->pluck('libelle', 'id');
        $typepieces = TypePiece::orderBy('libelle', 'ASC')->pluck('libelle', 'id');

        //paramètre association bénévole
        $domaineinterventions = DomaineIntervention::get();
        $populationcibles = PopulationCible::get();

        return view('accueil', [
            'sexes' => $sexes,
            'situationpros' => $situationpros,
            'situationmatrimonial' => $situationmatrimonial,
            'communes' => $communes,
            'regions' => $regions,
            'departements' => $departements,
            'districts' => $districts,
            'populationcible' => $populationcibles,
            'domaineinterventions' => $domaineinterventions,
            'nationnalites' => $nationnalites,
            'niveauscolaires' => $niveauscolaires,
            'diplomes' => $diplomes,
            'typepieces' => $typepieces,

        ]);
    }

    public function store(Request $request)
    {
       // dd($request->telephone);

        if ($request->type_inscription == 1) {
            //Association / Structure benevole
        } else {
            //Particulier benevole
            $rulesChar = "required_if:type_piece_id,";

            if ($request->type_piece_id == "" || $request->type_piece_id == null) {

                if ($request->type_piece_id == 1) {
                    $rulesChar .= "size:11|unique:App\Models\Benevole,numero_piece";
                }

                if ($request->type_piece_id == 2) {
                    $rulesChar .= "min:8|max:13|unique:App\Models\Benevole,numero_piece";
                }

                if ($request->type_piece_id == 3) {
                    $rulesChar .= "min:8|unique:App\Models\Benevole,numero_piece";
                }
            }

            $validation = Validator::make(
                [
                    'nom' => $request->nom,
                    'prenoms' => $request->prenoms,
                    'sexe' => $request->sexe_id,
                    'datenaissance' => $request->datenaissance,
                    'lieudenaissance' => $request->lieu_naissance_id,
                    'nationalite' => $request->nationalite_id,
                    'precisenationalite' => $request->precisenationalite,
                    'numero_piece' => $request->numero_piece,
                    'autre_typepiece' => $request->autre_typepiece,
                    'telephone' => $request->telephone,
                    'telephonen' => $request->telephone,
                    'telephone_autre' => $request->telephone_autre,
                    'telephone_autren' => $request->telephone_autre,

                    'lieuresidence' => $request->lieu_residence_id,
                    'situationmatrimoniale' => $request->situation_matrimoniale_id,
                    'situation_professionel' => $request->situation_professionel_id,

                    'district' => $request->district_id,
                    'region' => $request->region_id,
                    'departement' => $request->departement_id,
                    'sous_prefecture' => $request->sous_prefecture,

                    'preciser_type_handicap' => $request->preciser_type_handicap,
                    'situation_handicap' => $request->situation_handicap,
                    'scolarise' => $request->scolarise,
                    'niveau_scolaire' => $request->niveau_scolaire_id,
                    'membre_association' => $request->membre_association,
                    'preciser_travail' => $request->preciser_travail,
                    'preciser_association' => $request->preciser_association,
                    'domaine_intervention_asso' => $request->domaine_intervention_asso,
                ],
                [   'nom' => 'required',
                    'prenoms' => 'required',
                    'sexe' => 'required',
                    'lieudenaissance' => 'required',
                    'datenaissance' => 'required',
                    'nationalite' => 'required',
                    'precisenationalite' => 'required_if:nationalite,2',
                    'numero_piece' => $rulesChar,
                    'autre_typepiece' => 'required_if:type_piece_id,5',
                    'telephone' => 'required|digits:10|numeric|unique:App\Models\Benevole,telephone',
                    'telephonen' => 'digits:10|numeric|unique:App\Models\Benevole,telephone_autre',
                    'telephone_autre' => 'required_if:telephone_autre,digits:10|required_if:telephone_autre,numeric|unique:App\Models\Benevole,telephone_autre',
                    'telephone_autren' => 'required_if:telephone_autre,digits:10|required_if:telephone_autre,numeric|unique:App\Models\Benevole,telephone_autre',
                    'lieuresidence' => 'required',
                    'situationmatrimoniale' => 'required',
                    'preciser_type_handicap' => 'required_if:situation_handicap,2',
                    'situation_handicap' => 'required_if:preciser_type_handicap,1',
                    'scolarise' => 'required',
                    'district' => 'required',
                    'region' => 'required',
                    'departement' => 'required',
                    'sous_prefecture' => 'required',
                    'niveau_scolaire' => 'required_if:scolarise,1',
                    'membre_association' => 'required',
                    'preciser_travail' => 'required_if:situation_professionel,1',
                    'preciser_association' => 'required_if:membre_association,1',
                    'domaine_intervention_asso' => 'required_if:membre_association,1',
                ], [
                    'npieceidentite.size' => 'Le numéro de cette pièce n\'est pas conforme.',
                    'npieceidentite.unique' => 'Le numéro de cette pièce a déjà été pris.',
                ]
            )->validate();

            try {
                DB::beginTransaction();
                    $benevole =  Benevole::create($request->except('_token'));
                    $request->flash('success','Vos informations on bien été pris en compte'.$benevole->matricule);
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                $request->flash('success','Erreur est survenu pendant l\' enregistrement du formulaire!!!');
            }

            return back();
        }
    }
}
