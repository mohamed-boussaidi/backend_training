<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conge;


class CongeController extends Controller
{
    public function index(){
        $conge = Conge::with('Collaborateur')
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')->get();

        return response()->json($conge);

     }


    public function getCongeById($id)
    {
        $conge = Conge::find($id);
        return response()->json($conge)->setStatusCode(200);
    }
     public function addConge(Request $request)
     {
         $conge = new Conge;
         $conge->collaborateur_id = $request->input('collaborateur_id');
         $conge->status = 'pendding';
         $conge->demandateur = $request->input('demandateur');
         $conge->date_debut = $request->input('date_debut');
         $conge->date_fin = $request->input('date_fin');
         $conge->date_demande = $request->input('date_demande');
         $conge->nbr_jrs = $request->input('nbr_jrs');
         $conge->type_conge = $request->input('type_conge');
         $conge->save();

         return response()->json([
             'status'=> 200,
             'message'=>'Conge Added Successful',
         ]);
     }
     public function acceptConge(Request $request, $id)
    {
        $conge = Conge::find($id);
        $conge->status = 'accepted';
        $conge->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Conge Accepted Successfully',
        ]);
    }

    public function rejectConge(Request $request, $id)
    {
        $conge = Conge::find($id);
        $conge->status = 'rejected';
        $conge->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Conge Rejected Successfully',
        ]);
    }

    public function deleteConge(Request $request, $id)
    {
        $conge = Conge::find($id);
        $conge -> delete();
        return response()->json([
            'status'=> 200,
            'message'=>'Conge deleted Successfully',
        ]);
    }
}
