<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\Hash;

class CollaborateurController extends Controller
{

    public function index(){
       $collaborateurs = Collaborateur::all();
        return response()->json($collaborateurs);

    }
    public function store(Request $request)
    {
        $collaborateur = new Collaborateur;
        $collaborateur->matricule = $request->input('matricule');
        $collaborateur->sexe = $request->input('sexe');
        $collaborateur->nom = $request->input('nom');
        $collaborateur->prenom = $request->input('prenom');
        $collaborateur->telephone = $request->input('telephone');
        $collaborateur->email = $request->input('email');
        $collaborateur->cin = $request->input('cin');
        $collaborateur->date_naissance = $request->input('date_naissance');
        $collaborateur->adresse = $request->input('adresse');
        $collaborateur->code_postale = $request->input('code_postale');
        $collaborateur->type_contrat = $request->input('type_contrat');
        $collaborateur->fonction = $request->input('fonction');
        $collaborateur->date_entree = $request->input('date_entree');
        $collaborateur->date_sortie = $request->input('date_sortie');
        $collaborateur->ville = $request->input('ville');
        $collaborateur->departement = $request->input('departement');
        $collaborateur->ville = $request->input('ville');
        $collaborateur->password = Hash::make($request->input('password'));
        $collaborateur->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Collaborateur Added Successful',
        ]);
    }
    public function getCollaborateur($id)
    {
        $collaborateur = Collaborateur::find($id);
        return response()->json($collaborateur);
    }
    public function update(Request $request, $id)
    {
        $collaborateur = Collaborateur::find($id);
        $collaborateur->matricule = $request->input('matricule');
        $collaborateur->civilite = $request->input('civilite');
        $collaborateur->nom = $request->input('nom');
        $collaborateur->prenom = $request->input('prenom');
        $collaborateur->telephone = $request->input('telephone');
        $collaborateur->e_mail = $request->input('e_mail');
        $collaborateur->carte_identite = $request->input('carte_identite');
        $collaborateur->date_naissance = $request->input('date_naissance');
        $collaborateur->adresse = $request->input('adresse');
        $collaborateur->code_postale = $request->input('code_postale');
        $collaborateur->type_contrat = $request->input('type_contrat');
        $collaborateur->fonction = $request->input('fonction');
        $collaborateur->date_entree = $request->input('date_entree');
        $collaborateur->date_sortie = $request->input('date_sortie');
        $collaborateur->pole = $request->input('pole');
        $collaborateur->immeuble = $request->input('immeuble');
        $collaborateur->adresse_imme = $request->input('adresse_imme');
        $collaborateur->code_postal_imme = $request->input('code_postal_imme');
        $collaborateur->ville = $request->input('ville');
        $collaborateur->departement = $request->input('departement');
        $collaborateur->update();

        return response()->json([
            'status'=> 200,
            'message'=>'Collaborateur Update Successfully',
        ]);
    }
    public function destroy($id)
    {
        $collaborateur = Collaborateur::find($id);
        $collaborateur -> delete();
        return response()->json([
            'status'=> 200,
            'message'=>'Collaborateur deleted Successfully',
        ]);
    }
}
