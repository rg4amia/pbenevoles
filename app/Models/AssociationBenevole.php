<?php

namespace App\Models;

use App\Events\AssociationBenevoleSaved;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationBenevole extends Model
{
    use HasFactory,HasUuids;


    protected $fillable = [
        'matricule',
        'nom',
        'numero_enregistrement',
        'numero_creation',
        'statut_juridique',
        'region_id',
        'adresse_postale',
        'departement_id',
        'email',
        'site_web',
        'telephone',
        'email_repondant',
        'fax',
        'nom_repondant',
        'prenoms_repondant',
        'fonction_repondant_org',
        'telephone_repondant',
        'domaine_intervention_id',
        'population_cible_id',
        'effectif_personnel',
        'effectif_homme',
        'effectif_femme',
        'effectif_salaries',
        'effectif_contractuels',
        'effectif_benevoles',
        'montant_budget_anneeencour',
        'montant_budget_2019',
        'montant_budget_2018',
        'montant_budget_2017',
        'status_autreinfo',
        'preciser_autreinfo',
        'do_education_formation',
        'do_sante_communautaire',
        'do_assainissement_environnement',
        'do_promotion_droits_humains',
        'do_agriculture',
        'do_appui_aux_organisation',
        'do_developpement_communauteire',
        'do_autre',
        'pop_population_generale',
        'pop_homme',
        'pop_femme',
        'pop_jeunes',
        'pop_enfants',
        'pop_personne_agees',
        'pop_personne_vivant_avec_handicap',
        'pop_autre',
        'pop_preciser_autre',
        'do_preciser_autre',
    ];

     public function region(){
        return $this->belongsTo(Region::class,'region_id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }

    public function departement(){
        return $this->belongsTo(Departement::class,'departement_id');
    }

    protected $dispatchesEvents = [
        'saved' => AssociationBenevoleSaved::class,
    ];
}
