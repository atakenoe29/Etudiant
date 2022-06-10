<?php

namespace App\Http\Controllers;

use App\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::orderBy('created_at', 'DESC')->paginate(5);
        //dd($filieres);

        return response()->json($filieres);
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
        $request->validate([
            'name' => ''
        ]);

        $filiere = new Filiere;
        $filiere->name = mb_strtoupper($request->name);
        $filiere->save();

        if ($filiere){
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
        $filiere = Filiere::find($id);

        return response()->json($filiere);
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

        $filiere = Filiere::find($id);
        //dd($filiere);
        $filiere->name = mb_strtoupper(request('name'));
        $filiere->save();
        if ($filiere){
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
        $filiere = Filiere::find($id);
    
        if ($filiere->delete()) {

            return $this->refresh();

        }
    }

    private function refresh()
    {
        $filieres = Filiere::all();
        return response()->json($filieres);
    }
}