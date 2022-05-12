<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseReport;


class ExpenseReportController extends Controller
{
    public function index(){
        $ExpenseReport = ExpenseReport::with('Collaborateur')
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')->get();
        return response()->json($ExpenseReport);
    }


        public function addExpense(Request $request)
    {
        $expense = new ExpenseReport();
        $expense->collaborateur_id = $request->input('collaborateur_id');
        $expense->status = 'pendding';
        $expense->type_depense = $request->input('type_depense');
        $expense->total_ttc = $request->input('total_ttc');
        $expense->date_demande = $request->input('date_demande');
        $expense->client = $request->input('client');
        $expense->save();


        return response()->json([
            'status'=> 200,
            'message'=>'Expense Added Successful',
        ]);
    }


    public function acceptExpense(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'accepted';
        $order->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Order Accepted Successfully',
        ]);
    }

    public function rejectExpense(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'rejected';
        $order->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Order Rejected Successfully',
        ]);
    }

    public function deleteExpense(Request $request, $id)
    {
        $order = Order::find($id);
        $order -> delete();
        return response()->json([
            'status'=> 200,
            'message'=>'Order deleted Successfully',
        ]);
    }
}
