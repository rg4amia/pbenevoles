<?php

namespace App\Http\Controllers;

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

        //paramètre association bénévole
        $domaineinterventions = DomaineIntervention::pluck('libelle', 'id');
        $populationcibles = PopulationCible::pluck('libelle', 'id');


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

        ]);
    }

    public function store(Request $request)
    {

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
                    'datedenaissance' => $request->datedenaissance,
                    'lieudenaissance' => $request->lieu_naissance_id,
                    'nationalite' => $request->nationalite_id,
                    'numero_piece' => $request->numero_piece,
                    'telephone' => $request->telephone,
                    'telephonen' => $request->telephone,
                    'telephone_autre' => $request->telephone_autre,
                    'telephone_autren' => $request->telephone_autre,

                    'lieuresidence' => $request->lieu_residence_id,
                    'situationmatrimoniale' => $request->situation_matrimoniale_id,

                    'district' => $request->district_id,
                    'region' => $request->region_id,
                    'departement' => $request->departement_id,
                    'sous_prefecture' => $request->sous_prefecture,
                ],
                [   'nom' => 'required',
                    'prenoms' => 'required',
                    'sexe' => 'required',
                    'lieudenaissance' => 'required',
                    'nationalite' => 'required',
                    'numero_piece' => $rulesChar,
                    'telephone' => 'required|unique:App\Models\Benevole,telephone',
                    'telephonen' => 'required|unique:App\Models\Benevole,telephone_autre',
                    'telephone_autre' => 'required|unique:App\Models\Benevole,telephone_autre',
                    'telephone_autren' => 'required|unique:App\Models\Benevole,telephone_autre',
                    'lieuresidence' => 'required',
                    'situationmatrimoniale' => 'required',
                    'district' => 'required',
                    'region' => 'required',
                    'departement' => 'required',
                    'sous_prefecture' => 'required',
                ], [
                    'npieceidentite.size' => 'Le numéro de cette pièce n\'est pas conforme.',
                    'npieceidentite.unique' => 'Le numéro de cette pièce a déjà été pris.',
                ]
            );

            try {
                DB::beginTransaction();

                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
            }
        }
    }
}
