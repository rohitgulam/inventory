<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Expenditure;
use App\Models\Purchase;
use Carbon\Carbon;
use App\Models\Sell;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    // show all income 
    public function index (Request $request){
        // $items = DB::table('sells')
        //         ->crossJoin('transports')
        //         ->where('transports.created_at', '>=', Carbon::now()->subYear())->get();
        $items = [];
        // $query = Carbon::now()->subYear();
        $query = Carbon::parse($request->day);
        $sells = Sell::whereDate('created_at', '=', $query)->get();
        $transport = Transport::whereDate('created_at', '=', $query)->get();
        $account = Account::whereDate('created_at', '=', $query)->get();
        $purchases = Purchase::whereDate('created_at', '=', $query)->get();
        $expenses = Expenditure::whereDate('created_at', '=', $query)->get();

        array_push($items, $sells, $transport, $account, $purchases, $expenses);

        return view('accounts.daily-account', [
            'items' => $items
        ]
        );
    }
}
