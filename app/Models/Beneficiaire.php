<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model 
{

    protected $table = 'beneficiaire';
    public $timestamps = true;

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
        'preciser_autre_niveau_scolaire',
        'preciser_autre_diplome'
    ];

    public function sexe(){
        return $this->belongsTo(Sexe::class,'sexe_id');
    }

    public function diplome(){
        return $this->belongsTo(Diplome::class,'diplome_id');
    }

    public function niveauscolaire(){
        return $this->belongsTo(NiveauScolaire::class,'niveau_scolaire_id');
    }

    public function situationprofessionnel(){
        return $this->belongsTo(SituationProfessionel::class,'situation_professionel_id');
    }

    public function situationmatrimoniale(){
        return $this->belongsTo(SituationMatrimoniale::class,'situation_matrimoniale_id');
    }

    public function typepiece(){
        return $this->belongsTo(TypePiece::class,'type_piece_id');
    }

    public function nationalite(){
        return $this->belongsTo(Nationalite::class,'nationalite_id');
    }

    public function lieuresidence(){
        return $this->belongsTo(Commune::class,'lieu_residence_id');
    }

    public function lieunaissance(){
        return $this->belongsTo(Commune::class,'lieu_naissance_id');
    }

    public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    public function departement(){
        return $this->belongsTo(Departement::class,'departement_id');
    }

}