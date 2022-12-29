<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Expenditure;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    // show all
    public function index(Request $request){
        $query = Carbon::now();
        $items = Expenditure::whereDate('created_at', '>=', $query)->get();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
                $items = Expenditure::whereDate('created_at', '=', $query)->get();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
                $items = Expenditure::whereDate('created_at', '>=', $query)->get();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
                $items = Expenditure::whereDate('created_at', '>=', $query)->get();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
                $items = Expenditure::whereDate('created_at', '>=', $query)->get();
            }
        }
        return view('expenses', [
            'expenditure' => $items
        ]);
    }

    public function print(Request $request){
        $query = Carbon::now();
        $items = Expenditure::whereDate('created_at', '>=', $query)->get();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
                $items = Expenditure::whereDate('created_at', '=', $query)->get();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
                $items = Expenditure::whereDate('created_at', '>=', $query)->get();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
                $items = Expenditure::whereDate('created_at', '>=', $query)->get();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
                $items = Expenditure::whereDate('created_at', '>=', $query)->get();
            }
        }
        return view('print.print-expenses', [
            'expenses' => $items
        ]);
        
    }

    // Show create expenditure form 
    public function create(){
        return view('make-expense');
    }

    // Store the expenditure
    public function store(Request $request){

        // dd($request->all());
        $expensesArray = json_decode($request->expenses);

        foreach ($expensesArray as $expense) {
            $expense->description = $request->description;
            $expense->expenditure_by = $request->expenditure_by;
            $expenseArr = json_decode(json_encode($expense), true);

            Expenditure::create($expenseArr);
        }

        $currentDate = date('Y-m-d');

        $todaysAccount = Account::where('created_at', '=', $currentDate)->get();

        if ($todaysAccount->isEmpty()) {
            Account::create([
                'expenses' => $request->expense_sum
            ]);
        } else {
            $todaysAccount[0]->expenses = $todaysAccount[0]->expenses + $request->expense_sum;

            $todaysAccount[0]->save();
        }

        return redirect('/expenses')->with('message', 'Matumizi yamefanyika kikamilifu');

    }
}
