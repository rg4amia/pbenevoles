<?php

namespace App\Exports;

use App\Models\Beneficiaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ChefequipeExport implements FromCollection,WithHeadings
{
    use Exportable;

    protected $region;
    protected $departement;
    protected $superviseur;
    protected $lieuresidence;
    protected $nom;
    protected $telephone;
    

    public function __construct($response)
    {
       // dd($response);
        $this->region = $response->region;
        $this->departement = $response->departement;
        $this->superviseur = $response->superviseur;
        $this->lieuresidence = $response->lieuresidence;
        $this->nom = $response->nom;
        $this->telephone = $response->telephone;
        
    }
    /*$region,$lieuresidence,$date_fin,$date_debut,$nationalite,$sexe,$scolarise,$handicap*/

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $beneficiares = Beneficiaire::where('state',2)->when($this->region, function ($q) {
            $q->where('region',$this->region);
        })->when($this->lieuresidence, function ($q){
            $q->where('lieu_residence',$this->lieuresidence);
        })->when($this->superviseur, function ($q) {
            $q->where('chefequipe_id', $this->superviseur);
        })->when($this->departement, function($q) {
            $q->where('departement', $this->departement);
        })->when($this->nom, function ($q) {
            $q->where('nom','like', '%'.$this->nom.'%');
        })->when($this->telephone, function ($q) {
            $q->where('telephone', $this->telephone);
        })->get();

        $data = [];

        foreach ($beneficiares as $beneficiare) {
            $data [] = [
                'matricule' => $beneficiare->matricule,
                'nom' => $beneficiare->nom,
                'lieu_residence' => $beneficiare->lieu_residence,
                'region' => $beneficiare->region,
                'departement' => $beneficiare->departement,
                'telephone' => $beneficiare->telephone,
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
            'Matricule',
            'Nom',
            'Lieu de residence',
            'Région',
            'Département',
            'Téléphone'
        ];
    }

}
