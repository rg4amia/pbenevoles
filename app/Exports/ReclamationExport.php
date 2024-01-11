<?php

namespace App\Exports;

use App\Models\Reclamation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Auth;

class ReclamationExport implements FromCollection,WithHeadings
{
    use Exportable;

    protected $date_debut;
    protected $date_fin;
    protected $lieuresidence;
    protected $nom;
    protected $telephone;
    protected $type_reclamation;
  

    public function __construct($response)
    {
       // dd($response);
        $this->date_debut = $response->date_debut;
        $this->date_fin = $response->date_fin;
        $this->lieuresidence = $response->lieuresidence;
        $this->nom = $response->nom;
        $this->telephone = $response->telephone;
        $this->type_reclamation = $response->type_reclamation;
    }
    /*$region,$lieuresidence,$date_fin,$date_debut,$nationalite,$sexe,$scolarise,$handicap*/

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        ini_set("memory_limit", "-1"); set_time_limit(0);
        ini_set('max_execution_time', 500);
    
        $date_debut = $this->date_debut;
        $date_fin = $this->date_fin;
        $lieuresidence = $this->lieuresidence;
        $nom = $this->nom;
        $telephone = $this->telephone;
        $type_reclamation = $this->type_reclamation;

        $reclamations = Reclamation::when($this->date_debut && $this->date_fin, function ($q){
                $q->whereBetween('created_at', [$this->date_debut.' 00:00:00', $this->date_fin.' 23:59:59']);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence_ins',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->when($type_reclamation, function ($q) use ($type_reclamation){
                $q->where('type_reclamation',$type_reclamation);
            })->get();

        $data = [];

        foreach ($reclamations as $reclamation) {
            $data [] = [
                'nom' => @$reclamation->nom,
                'telephone' => @$reclamation->telephone,
                'lieu_residence_ins' => @$reclamation->residenceInscrit->libelle,
                'type_reclamation' => @$reclamation->typeReclamation->libelle,
                'nom_correct' => @$reclamation->nom_correct,
                'lieu_residence_id' => @$reclamation->lieuresidence->libelle,
                'autre' => @$reclamation->autre
            ];
        }

        $data = collect($data)->map(function ($item) {
            return collect($item)->map(function ($value, $key) {
                if ($key != 'badge'){
                    return strtoupper($value);
                }
            });

        });

        return $data;

    }

    public function headings(): array
    {
        return [
            'Nom',
            'Téléphone',
            'Lieu de résidence à l\'ins',
            'Type de reclamation',
            'Nom correct',
            'Lieu de résidence correct',
            'Autre réclamation',
        ];
    }

}
