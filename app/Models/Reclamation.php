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

    // public function lieunaissance(){
    //     return $this->belongsTo(Commune::class,'lieu_naissance_id');
    // }


}