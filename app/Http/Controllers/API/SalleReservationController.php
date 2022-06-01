<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
         $reservation->salle_id = $request->input('salle_id');
         /** ---------       send this format 2017-10-19T15:30:00        ------------ **/
         $reservation->hour_start = Carbon::createFromFormat('Y-m-d\TH:i:s', $request->input('hour_start'));
         /** ---------       send this format 2017-10-19T15:30:00        ------------ **/
         $reservation->hour_end = Carbon::createFromFormat('Y-m-d\TH:i:s', $request->input('hour_end'));
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

    public function getReservationStat(Request $request,$id)
    {
        $reservation = SalleReservation::select('*')
            ->where('collaborateur_id', '=', $id)
            ->get();

        return response()->json(['nbr'=>count($reservation)]);
    }
}
