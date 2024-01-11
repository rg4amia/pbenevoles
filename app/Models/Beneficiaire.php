<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiaire extends Model 
{

    protected $table = 'beneficiaire';
    public $timestamps = true;

    protected $fillable = [
        'chefequipe_id',
        'matricule',
        'code',
        'nom',
        'lieu_residence',
        'region',
        'departement',
        'telephone',
        'state',
        'is_affected',
    ];

    public function reclamation(){
        return $this->belongsTo(Reclamation::class,'telephone');
    }

    // public function diplome(){
    //     return $this->belongsTo(Diplome::class,'diplome_id');
    // }

    // public function niveauscolaire(){
    //     return $this->belongsTo(NiveauScolaire::class,'niveau_scolaire_id');
    // }

    // public function situationprofessionnel(){
    //     return $this->belongsTo(SituationProfessionel::class,'situation_professionel_id');
    // }

    // public function situationmatrimoniale(){
    //     return $this->belongsTo(SituationMatrimoniale::class,'situation_matrimoniale_id');
    // }

    // public function typepiece(){
    //     return $this->belongsTo(TypePiece::class,'type_piece_id');
    // }

    // public function nationalite(){
    //     return $this->belongsTo(Nationalite::class,'nationalite_id');
    // }

    // public function lieuresidence(){
    //     return $this->belongsTo(Commune::class,'lieu_residence_id');
    // }

    // public function lieunaissance(){
    //     return $this->belongsTo(Commune::class,'lieu_naissance_id');
    // }

    // public function region(){
    //     return $this->belongsTo(Region::class,'region_id');
    // }

    // public function district(){
    //     return $this->belongsTo(District::class,'district_id');
    // }

    // public function departement(){
    //     return $this->belongsTo(Departement::class,'departement_id');
    // }

}