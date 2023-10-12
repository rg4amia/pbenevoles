<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    public function index(){
        return view('accueil');
    }

    public function store(Request $request) {

    }
}
