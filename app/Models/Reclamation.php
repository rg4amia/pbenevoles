<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model 
{

    protected $table = 'reclamation';
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'telephone',
        'type_reclamation',
        'nom_correct',
        'lieu_naissance_id',
        'autre',
        'state'
    ];


    public function lieuresidence(){
        return $this->belongsTo(Commune::class,'lieu_residence_id');
    }
    public function residenceInscrit(){
        return $this->belongsTo(Commune::class,'lieu_residence_ins');
    }

    public function typeReclamation(){
        return $this->belongsTo(Type_reclamation::class,'type_reclamation');
    }

    public function beneficiaire(){
        return $this->hasMany(Beneficiaire::class,'telephone','telephone');
    }

    // public function lieunaissance(){
    //     return $this->belongsTo(Commune::class,'lieu_naissance_id');
    // }


}