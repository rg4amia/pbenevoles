<?php

namespace App\Exports;

use App\Models\Benevole;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class BenevoleExport implements FromCollection,WithHeadings
{
    use Exportable;

    protected $region;
    protected $lieuresidence;
    protected $date_fin;
    protected $date_debut;
    protected $nationalite;
    protected $sexe;
    protected $scolarise;
    protected $handicap;

    public function __construct($response)
    {
       // dd($response);
        $this->etape = $response->region;
        $this->lieuresidence = $response->lieuresidence;
        $this->date_fin = $response->date_fin;
        $this->date_debut = $response->date_debut;
        $this->nationalite = $response->nationalite;
        $this->sexe = $response->sexe;
        $this->scolarise = $response->scolarise;
        $this->handicap = $response->handicape;
    }
    /*$region,$lieuresidence,$date_fin,$date_debut,$nationalite,$sexe,$scolarise,$handicap*/

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $benevoles = Benevole::when($this->region, function ($q) {
            $q->where('region_id',$this->region);
        })->when($this->lieuresidence, function ($q){
            $q->where('lieu_residence_id',$this->lieuresidence);
        })->when($this->date_debut && $this->date_fin, function ($q){
            $q->whereBetween('created_at', [$this->date_debut.' 00:00:00', $this->date_fin.' 23:59:59']);
        })->when($this->nationalite, function ($q) {
            $q->where('nationalite_id', $this->nationalite);
        })->when($this->sexe, function($q) {
            $q->where('sexe_id', $this->sexe);
        })->when($this->scolarise, function ($q) {
            $q->where('scolarise', $this->scolarise);
        })->when($this->handicap, function ($q) {
            $q->where('situation_handicap', $this->handicap);
        })->get();

       // $benevoles = Benevole::with('sexe', 'diplome', 'niveauscolaire', 'situationprofessionnel', 'situationmatrimoniale', 'typepiece', 'nationalite', 'lieuresidence', 'lieunaissance','district' ,'region','departement')->get();
        $data = [];
        foreach ($benevoles as $benevole) {
            $data [] = [
                'nom' => $benevole->nom,
                'prenoms' => $benevole->prenoms,
                'telephone' => $benevole->telephone,
                'datenaissance' => $benevole->datenaissance,
                'lieunaissance' => $benevole->lieunaissance->libelle,
                'matricule' => $benevole->matricule,
                'sexe' => $benevole->sexe->libelle,
                'nationnalite' => $benevole->nationalite->libelle,
                'typepiece' => $benevole->typepiece->libelle,
                'autre_typepiece' => $benevole->autre_typepiece,
                'numero_piece' => $benevole->numero_piece,
                'situationmatrimoniale' => $benevole->situationmatrimoniale->libelle,
                'lieuresidence' => $benevole->lieuresidence->libelle,
                'district' => $benevole->district->libelle,
                'region' => $benevole->region->libelle,
                'departement' => $benevole->departement->libelle,
                'sous_prefecture' => $benevole->sous_prefecture,
                'situation_handicap' => $benevole->situation_handicap  ? 'OUI' : 'NON',
                'preciser_type_handicap' => $benevole->preciser_type_handicap,
                'scolarise' => $benevole->scolarise ? 'OUI' : 'NON',
                'niveauscolaire' => @$benevole->niveauscolaire->libelle,
                'preciser_niveau_scolaire' => @$benevole->preciser_niveau_scolaire,
                'diplome' => @$benevole->diplome->libelle,
                'preciser_autre_diplome' => @$benevole->preciser_autre_diplome,
                'preciser_diplome' => @$benevole->preciser_diplome,
                'situationprofessionnel' => @$benevole->situationprofessionnel->libelle,
                'preciser_travail' => @$benevole->preciser_travail,
                'membre_association' => @$benevole->membre_association,
                'preciser_association' => @$benevole->preciser_association,
                'domaine_intervention_asso' => @$benevole->domaine_intervention_asso,
                'precisenationalite' => @$benevole->precisenationalite,
                'preciser_autre_niveau_scolaire' => @$benevole->preciser_autre_niveau_scolaire,
                'badge' => route('badgepdf',$benevole->matricule),
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
            'Prenoms',
            'Téléphone',
            'Date naissance',
            'Lieu naissance',
            'Matricule',
            'Sexe',
            'Nationnalité',
            'Type piece',
            'Autre type pièce',
            'Numero pièce',
            'Situation matrimoniale',
            'Lieu residence',
            'District',
            'Région',
            'Département',
            'Sous prefecture',
            'Situation handicap',
            'Préciser type handicap',
            'Scolarisé',
            'Niveau scolaire',
            'Preciser niveau scolaire',
            'Diplome',
            'Préciser autre diplome',
            'Préciser Diplome',
            'Situation Professionnel',
            'Préciser travail',
            'Membre association',
            'Preciser association',
            'Domaine intervention association',
            'Precise nationalité',
            'Preciser autre niveau scolaire',
            'Badge',
        ];
    }

}
