<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filiere;
use App\Etudiant;

class FiltreController extends Controller
{
    public function index()
    {
        $filieres = Filiere::orderBy('created_at', 'DESC')->get();
        //dd($filieres);

        return response()->json($filieres);
    }

    public function getFiliere($id)
    {
        $filiere = Filiere::find($id);

        return response()->json($filiere);
    }

    public function getEtudiants()
    {
        $etudiants = Etudiant::orderBy('created_at', 'DESC')->get();

        return response()->json($etudiants);
    }

}
