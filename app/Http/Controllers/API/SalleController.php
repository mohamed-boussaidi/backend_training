<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salle;

class SalleController extends Controller
{
    public function index(){
        $salle = Salle::with('SalleReservation','SalleReservation.Collaborateur')
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')->get();

        return response()->json($salle);
     }
      public function store(Request $request)
     {
         $salle = new Salle;
         $salle->nom_du_salle = $request->input('nom_du_salle');
         $salle->nbr_place = $request->input('nbr_place');
         $salle->equipements = $request->input('equipements');
         $salle->etage = $request->input('etage');
         $salle->image = $request->input('image');
         $salle->save();

         return response()->json([
             'status'=> 200,
             'message'=>'Salle Added Successful',
         ]);
     }
     public function edit($id)
     {
         $salle = Salle::find($id);
         return response()->json($salle);
     }
     public function update(Request $request, $id)
     {
        $salle = new Salle;
        $salle->nom_du_salle = $request->input('nom_du_salle');
        $salle->nbr_place = $request->input('nbr_place');
        $salle->equipements = $request->input('equipements');
        $salle->etage = $request->input('etage');
        $salle->image = $request->input('image');

         $salle->update();

        return response()->json([
            'status'=> 200,
            'message'=>'salle Update Successfully',
        ]);
     }
     public function destroy($id)
    {
        $salle = Salle::find($id);
        $salle -> delete();

        return response()->json([
            'status'=> 200,
            'message'=>'Salle deleted Successfully',
        ]);
    }
}
