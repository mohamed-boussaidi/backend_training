<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SalleReservation;


class SalleReservationController extends Controller
{   


    public function index(){
        $reservation = SalleReservation::with('salle','collaborateur')
        ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')->get();         
        return response()->json($reservation);
     }
    public function getReservation($id)
    {
        $reservation = SalleReservation::find($id);
        return response()->json($reservation);
    }
    public function addReservation(Request $request)
     {
         $reservation = new SalleReservation;
         $reservation->collaborateur_id = $request->input('collaborateur_id');
         $reservation->demandateur = $request->input('demandateur');
         $reservation->salle_id = $request->input('salle_id');
         $reservation->hour_start = $request->input('hour_start');
         $reservation->hour_end = $request->input('hour_end');
         $reservation->date_reunion = $request->input('date_reunion');
         $reservation->nbr_participant = $request->input('nbr_participant');
         $reservation->material_dispo = $request->input('material_dispo');
         $reservation->name_event = $request->input('name_event');
         $reservation->save();

         return response()->json([
             'status'=> 200,
             'message'=>'Reservation Added Successful',
         ]);
     }
     public function deleteReservation(Request $request, $id)
    {
        $reservation = SalleReservation::find($id);
        $reservation -> delete();
        return response()->json([
            'status'=> 200,
            'message'=>'Reservation deleted Successfully',
        ]);
    }
}
