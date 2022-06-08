<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\TypeDepense;


class TypeDepenseController extends Controller
{
    public function index(){
        $depenses = TypeDepense::all();
        return response()->json($depenses);
    }
    public function store(Request $request)
    {
        $depense = new TypeDepense;
        $depense->nom = $request->input('nom');
        $depense->save();
        return response()->json([
            'status'=> 200,
            'message'=>' depense Added Successful',
        ]);
    }
    public function getDepenseById($id)
    {
        $depense = TypeDepense::find($id);
        return response()->json($depense);

    }
    public function update(Request $request, $id)
    {
        $depense = TypeDepense::find($id);
        $depense->nom = $request->input('nom');
        $depense->update();

        return response()->json([
            'status'=> 200,
            'message'=>'Depense Update Successfully',
        ]);
    }
    public function destroy($id)
    {
        $depense = TypeDepense::find($id);
        $depense -> delete();

        return response()->json([
            'status'=> 200,
            'message'=>'Depense deleted Successfully',
        ]);
    }
}

