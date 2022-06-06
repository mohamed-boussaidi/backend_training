<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Models\ExpenseReport;
use Illuminate\Support\Facades\Mail;


class ExpenseReportController extends Controller
{
    public function index(){
        $ExpenseReport = ExpenseReport::with('Collaborateur')
            ->orderBy(\request()->sortBy ?? 'id', \request()->orderBy ?? 'desc')->get();
        return response()->json($ExpenseReport);
    }


    public function update(Request $request, $id){
        $expense = ExpenseReport::find($id);
        $expense->collaborateur_id = $request->input('collaborateur_id');
        $expense->status = 'pendding';
        $expense->date_demande = $request->input('date_demande');
        $expense->client = $request->input('client');
        $expense->type_depense = $request->input('type_depense');
        $expense->total_ttc = $request->input('total_ttc');
        $expense->update();
        return response()->json([
            'status'=> 200,
            'message'=>'expense Update Successfully',
        ]);

     }
    public function getExpenseById($id)
    {
        $expense = ExpenseReport::find($id);
        return response()->json($expense)->setStatusCode(200);
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
        $expense = ExpenseReport::find($id);
        $expense->status = 'accepted';
        $expense->save();

        $details = [
            'title' => 'Votre Demande de note de frai Numero '.$id.' a été accepté',
            'body'  => 'Expense Accepted .'
        ];
        Mail::to("islemamor38@gmail.com")->send(new TestMail($details));

        return response()->json([
            'status'=> 200,
            'message'=>'expense Accepted Successfully',
        ]);
    }

    public function rejectExpense(Request $request, $id)
    {
        $expense = ExpenseReport::find($id);
        $expense->status = 'rejected';
        $expense->save();

        $details = [
            'title' => 'Votre Demande de note de frai Numero '.$id.' a été refusé',
            'body'  => 'Expense Rejected .'
        ];
        Mail::to("islemamor38@gmail.com")->send(new TestMail($details));

        return response()->json([
            'status'=> 200,
            'message'=>'expense Rejected Successfully',
        ]);
    }

    public function deleteExpense(Request $request, $id)
    {
        $expense = ExpenseReport::find($id);
        $expense -> delete();
        return response()->json([
            'status'=> 200,
            'message'=>'ExpenseReport deleted Successfully',
        ]);
    }
    public function ExpenseStat(Request $request){
        $expenses = ExpenseReport::all();
        return response()->json(['nbr'=>$expenses->count()]);
    }
    public function ExpenseSum(Request $request, $id){
        $expenses = ExpenseReport::where('collaborateur_id', '=', $id)->sum('total_ttc');
        return response()->json(['sum'=>$expenses]);
    }
}
