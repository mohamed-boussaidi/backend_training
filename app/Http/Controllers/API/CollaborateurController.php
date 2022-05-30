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

    public function CollaborateurLogin(Request $request){
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = auth()->guard('collaborateurs')->attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        $email =$request->input('email');
        $user = Collaborateur::where('email',$email)->first();
        return response()->json([
            'data' => $user,
            'token' => $token,
            'role' => 'collaborateur',
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
    public function collabStat(){
        $collaborateurs = Collaborateur::all();
        return response()->json(['nbr_collaborateurs'=>$collaborateurs->count()]);
    }
}
