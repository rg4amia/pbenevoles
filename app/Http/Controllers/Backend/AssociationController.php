<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Benevole;
use App\Models\AssociationBenevole;
use App\Models\Departement;
use App\Models\Region;
use App\Models\Commune;
use Maatwebsite\Excel\Facades\Excel;

class AssociationController extends Controller
{
    public function index(){

        $benevoles = AssociationBenevole::with('region','departement')->paginate(25);
        $regions = Region::pluck('libelle','id');
        $departements = Departement::pluck('libelle','id');
        $communes = Commune::pluck('libelle','id');
        

        return view('backend.page.association.index', compact('benevoles','regions','departements','communes'));

    }

}
