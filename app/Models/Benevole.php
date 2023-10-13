<?php

namespace App\Models;

use App\Events\BenevoleSaved;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    use HasFactory,HasUuids;

    protected $dispatchesEvents = [
        'saved' => BenevoleSaved::class,
    ];
    protected $fillable = [
        'matricule',
        'photoidentite',
        'nom',
        'prenoms',
        'datenaissance',
        'lieu_naissance_id',
        'sexe_id',
        'nationalite_id',
        'telephone',
        'type_piece_id',
        'autre_typepiece',
        'numero_piece',
        'situation_matrimoniale_id',
        'lieu_residence_id',
        'district_id',
        'region_id',
        'departement_id',
        'sous_prefecture',
        'situation_handicap',
        'preciser_type_handicap',
        'scolarise',
        'niveau_scolaire',
        'preciser_niveau_scolaire',
        'niveau_scolaire_id',
        'diplome_id',
        'preciser_diplome',
        'situation_professionel_id',
        'preciser_travail',
        'membre_association',
        'preciser_association',
        'domaine_intervention_asso',
        'precisenationalite',
    ];
}
