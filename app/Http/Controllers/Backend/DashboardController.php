<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Benevole;

class DashboardController extends Controller
{

    public function index(){
        return view('backend.page.dashboard');
    }

    public function dasboard(){
        $totalInscrits = Benevole::count();
        $totalHomme = Benevole::where('sexe_id',1)->count();
        $totalFemme = Benevole::where('sexe_id',2)->count();

        $totalHandicap = Benevole::where('situation_handicap',1)->count();
        $totalNonHandicap = Benevole::where('situation_handicap',2)->count();
        return view('backend.page.admin_dash', compact('totalInscrits','totalHomme','totalFemme','totalHandicap','totalNonHandicap'));
    }
}
