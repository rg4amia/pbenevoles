<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Benevole;
use Illuminate\Http\Request;

class ParticulierController extends Controller
{
    public function index(){
        $benevoles = Benevole::with()->paginate(100);
        return view('backend.page.particulier.index', compact('benevoles'));
    }
}
