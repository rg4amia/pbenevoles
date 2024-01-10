<?php

namespace App\Exports;

use App\Models\Beneficiaire;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class BeneficiaireExport implements FromCollection,WithHeadings
{
    use Exportable;

    protected $region;
    protected $nom;
    protected $telephone;
    protected $lieuresidence;
    protected $departement;
    protected $chefequipe;
  

    public function __construct($response)
    {
       // dd($response);
        $this->region = $response->region;
        $this->nom = $response->nom;
        $this->telephone = $response->telephone;
        $this->lieuresidence = $response->lieuresidence;
        $this->departement = $response->departement;
        $this->chefequipe = $response->chefequipe;
    }
    /*$region,$lieuresidence,$date_fin,$date_debut,$nationalite,$sexe,$scolarise,$handicap*/

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        ini_set("memory_limit", "-1"); set_time_limit(0);
    ini_set('max_execution_time', 500);
    
        $region = $this->region;
        $nom = $this->nom;
        $telephone = $this->telephone;
        $lieuresidence = $this->lieuresidence;
        $departement = $this->departement;
        $chefequipe = $this->chefequipe;

        $benevoles = Beneficiaire::when($region, function ($q) use ($region) {
                $q->where('region',$region);
            })->when($lieuresidence, function ($q) use ($lieuresidence){
                $q->where('lieu_residence',$lieuresidence);
            })->when($nom, function ($q) use ($nom){
                $q->where('nom','like','%'.$nom.'%');
            })->when($telephone, function ($q) use ($telephone){
                $q->where('telephone',$telephone);
            })->when($departement, function ($q) use ($departement){
                $q->where('departement',$departement);
            })->when($chefequipe, function ($q) use ($chefequipe){
                $q->where('chefequipe_id',$chefequipe);
            })->get();

        $data = [];

        foreach ($benevoles as $benevole) {
            $data [] = [
                'matricule' => $benevole->matricule,
                'code' => $benevole->code,
                'nom' => $benevole->nom,
                'lieu_residence' => $benevole->lieu_residence,
                'region' => $benevole->region,
                'departement' => $benevole->departement,
                'telephone' => $benevole->telephone
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
            'matricule',
            'code',
            'nom',
            'lieu de residence',
            'region',
            'departement',
            'telephone',
        ];
    }

}
