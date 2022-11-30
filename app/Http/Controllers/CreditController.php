<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Account;
use Illuminate\Http\Request;

class CreditController extends Controller
{

    // show all purchases
    public function index(){
        $products = Sell::where('credit', '=', 1)->get();

        return view('credit', ([
            'products' => $products
        ]));
    }

    // Show pay form
    public function edit(Sell $sell){
        return view('pay-credit', ['product' => $sell]);
    }

    // Update credit
    public function update(Request $request, Sell $sell){
        $formFields = $request->validate([
            'paid_amount' => 'integer|required'
        ]);

        $totalPaid = [
            'paid_amount' => $sell->paid_amount + $formFields['paid_amount']
        ];

        $sell->update($totalPaid);

        if($sell->unit_sum === $sell->paid_amount){
            $sell->credit = 0;
            $sell->save();

            $currentDate = date('Y-m-d');
            $todaysAccount = Account::where('created_at', '=', $currentDate)->get();
            if ($todaysAccount->isEmpty()) {
                Account::create([
                    'revenue' => $sell->unit_sum
                ]);
            } else {
                $todaysAccount[0]->revenue = $todaysAccount[0]->revenue + $sell->unit_sum;
                $todaysAccount[0]->profit = $todaysAccount[0]->profit + $sell->profit;
    
                $todaysAccount[0]->save();
            } 
        }

        return redirect('/credits')->with('message', 'Mkopo umelipwa');
    }




}
