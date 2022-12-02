<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    // index
    public function index(){
        return view('transport', [
            'transports' => Transport::latest()->paginate(200)
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
}
