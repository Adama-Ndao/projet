<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Etudiant;
use App\Models\Semestre;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function etudiant()
    {
        $etudiants = Etudiant::all(); 
        $matieres = Matiere::all(); 
        $semestres = Semestre::all(); 

        return view('etudiant', [
            'etudiants' =>$etudiants,
            'matieres' =>$matieres,
            'semestres' =>$semestres,
        ]);
    }

    public function ajout()
    {
        $matieres = Matiere::all();
        $semestres = Semestre::all();
        return view('ajout', ['matieres' => $matieres, 'semestres' => $semestres]); 
    }

    public function store(Request $request)
    {
        $etudiant = Etudiant::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            
        ]);
        $etudiant->matieres()->attach([
            $request->matieres => [
                'note' => $request->note,
                'examen' => $request->examen
            ]
        ]);
        $etudiant->semestres()->attach($request->semestres);
        return redirect()->back(); 
    }
}
