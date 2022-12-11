<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // show all purchases
    public function index (Request $request){
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
        return view('purchases', [
            'purchases' => Purchase::whereDate('created_at', '>=', $query)->get()
        ]);
    }

    // Show create form 
    public function create(){
        return view('make-purchase');
    }

    // Create a purchases
    public function store(Request $request){
        // $formFields = $request->validate([
        //     'product' => 'required|string',
        //     'product_id' => 'required|integer',
        //     'quantity' => 'required|integer',
        //     'price' => 'required|integer',
        //     'credit' => 'required|integer',
        //     'purhcase_from' => 'required|string',
        //     'purchase_by' => 'required|string',
        // ]);


        $order = $request->orders;

        $ordersArray = json_decode($order);

        foreach ($ordersArray as $order) {
            $order->description = $request->description;
            $order->credit = $request->credit;
            $order->purchase_from = $request->purchase_from;
            $order->purchase_by = $request->purchase_by;
            $orderArr = json_decode(json_encode($order), true);

            Purchase::create($orderArr);

            $product = Product::find($order->product_id);

            $product->quantity = $product->quantity + $order->quantity;
            $product->buying_price = $order->price;

            $product->save();
        }

        $currentDate = date('Y-m-d');

        $todaysAccount = Account::where('created_at', '=', $currentDate)->get();

        if($order->credit == 0){
            if ($todaysAccount->isEmpty()) {
                Account::create([
                    'expenses' => $request->order_sum
                ]);
            } else {
                $todaysAccount[0]->expenses = $todaysAccount[0]->expenses + $request->order_sum;
    
                $todaysAccount[0]->save();
            } 
        }

        return redirect('/purchases')->with('message', 'Manunuzi yamefanyika kikamilifu');
    }
}
