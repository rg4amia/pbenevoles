<?php

namespace App\Exports;

use App\Models\Pointage;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PointageDetailExport implements FromCollection,WithHeadings
{
    use Exportable;

    protected $date_debut;
    protected $date_fin;
    protected $author_id;
    protected $pointage_id;
    
    

    public function __construct($response)
    {
       // dd($response);
        $this->date_debut = $response->date_debut;
        $this->date_fin = $response->date_fin;
        $this->author_id = $response->author_id;
        $this->pointage_id = $response->pointage_id;
        
    }
    /*$region,$lieuresidence,$date_fin,$date_debut,$nationalite,$sexe,$scolarise,$handicap*/

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date_debut =$this->date_debut;
        $date_fin =$this->date_fin;
        $author_id =$this->author_id;
        $pointage_id =$this->pointage_id;

        $pointages =Pointage::join('pointage_benevoles','pointages.id','pointage_benevoles.pointage_id')
                ->leftjoin('beneficiaire','pointage_benevoles.benevole_id','beneficiaire.id')
                ->leftjoin('users','pointages.author_id','users.id')
                ->select('users.name','pointages.date','pointages.periode','beneficiaire.nom','beneficiaire.telephone','pointage_benevoles.pointage')
                ->when($pointage_id, function ($q) use ($pointage_id){
                $q->where('pointages.id', $pointage_id);
            })->when($date_debut, function ($q) use ($date_debut){
                $q->where('pointages.date','>=',$date_debut);
            })->when($date_fin, function ($q) use ($date_fin){
                $q->where('pointages.date','<=',$date_fin);
            })->when($author_id, function ($q) use ($author_id){
                $q->where('pointages.author_id',$author_id);
            })->get();


        $data = [];

        foreach ($pointages as $pointage) {
            $check = '';
            if($pointage->pointage == 1){ $check='PRESENT';}elseif($pointage->pointage == 2){$check='ABSENT';}else{$check='PERMISSIONNAIRE';}
            $data [] = [
                'Auteur' => $pointage->name,
                'date' => $pointage->date,
                'periode' => $pointage->periode,
                'nom' => $pointage->nom,
                'telephone' => $pointage->telephone,
                'pointage' => $check,
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
            'Chef d\équipe',
            'Date',
            'Période',
            'Nom',
            'Téléphone',
            'Pointage'
        ];
    }

}
