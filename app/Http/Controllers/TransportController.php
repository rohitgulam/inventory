<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    // index
    public function index(Request $request){
        $query = Carbon::now();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
            }
        }
        return view('transport', [
            'transports' => Transport::whereDate('created_at', '>=', $query)->get()
        ]);
    }
    // Show form
    public function create(){
        return view('make-transport');
    }
    // create transport
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'issued_by' => 'required',
            'amount' => 'required|integer',
        ]);

        Transport::create($formFields);

        $currentDate = date('Y-m-d');

        $todaysAccount = Account::where('created_at', '=', $currentDate)->get();

        
        if ($todaysAccount->isEmpty()) {
            Account::create([
                'revenue' => $request->amount
            ]);
        } else {
            $todaysAccount[0]->revenue = $todaysAccount[0]->revenue + $request->amount;
            $todaysAccount[0]->profit = $todaysAccount[0]->profit + $request->amount;

            $todaysAccount[0]->save();
        } 

        return redirect('/transport')->with('message', 'Transportation created succesfully');
    }

    public function print(Request $request){
        $query = Carbon::now();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
            }
        }
        return view('print.print-transport', [
            'transports' => Transport::whereDate('created_at', '>=', $query)->get()
        ]);
    }
}
