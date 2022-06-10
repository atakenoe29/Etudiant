<?php

namespace App\Http\Controllers;

use App\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        //dd($etudiants);

        return response()->json($etudiants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$etudiant = Etudiant::create($request->all());
        
        $request->validate([
            'nom' => '',
            'prenoms' => '',
            'sexe' => '',
            'date_naissance' => '',
            'email' => '',
            'telephone' => '',
            'filiere' => '',
        ]);

        $etudiant = new Etudiant;
        $etudiant->nom = mb_strtoupper($request->nom);
        $etudiant->prenoms = ucwords($request->prenoms);
        $etudiant->sexe = ucfirst($request->sexe);
        $etudiant->date_naissance = $request->date_naissance;
        $etudiant->email = $request->email;
        $etudiant->telephone = $request->telephone;
        $etudiant->filiere = mb_strtoupper($request->filiere);
        $etudiant->save();
      
        if ($etudiant){
            return $this->refresh();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant = Etudiant::find($id);

        return response()->json($etudiant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $etudiant = Etudiant::find($id);
        //dd($filiere);
        $etudiant->nom = mb_strtoupper(request('nom'));
        $etudiant->prenoms = ucwords(request('prenoms'));
        $etudiant->sexe = ucfirst(request('sexe'));
        $etudiant->date_naissance = request('date_naissance');
        $etudiant->email = request('email');
        $etudiant->telephone = request('telephone');
        $etudiant->filiere = mb_strtoupper(request('filiere'));
        $etudiant->save();
        if ($etudiant){
            return $this->refresh();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);
    
        if ($etudiant->delete()) {

            return $this->refresh();
        }
    }

    private function refresh()
    {
        $etudiants = Etudiant::all();
        return response()->json($etudiants);
    }
}
