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
        $items = Purchase::whereDate('created_at', '>=', $query)->get();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
                $items = Purchase::whereDate('created_at', '=', $query)->get();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
                $items = Purchase::whereDate('created_at', '>=', $query)->get();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
                $items = Purchase::whereDate('created_at', '>=', $query)->get();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
                $items = Purchase::whereDate('created_at', '>=', $query)->get();
            }
        }
        return view('purchases', [
            'purchases' => $items
        ]);
    }

    public function print(Request $request){
        $query = Carbon::now();
        $items = Purchase::whereDate('created_at', '>=', $query)->get();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
                $items = Purchase::whereDate('created_at', '=', $query)->get();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
                $items = Purchase::whereDate('created_at', '>=', $query)->get();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
                $items = Purchase::whereDate('created_at', '>=', $query)->get();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
                $items = Purchase::whereDate('created_at', '>=', $query)->get();
            }
        }
        return view('print.print-purchase', [
            'purchases' => $items
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

    // Show purchase edit form 
    public function edit(purchase $purchase){
        return view('purchases/edit', ['product' => $purchase]);
    }

    // Update purchase
    public function update(Request $request, Purchase $purchase){

        $formFields = $request->validate([
            'quantity' => 'required|integer',
            'price' => 'required|integer'
        ]);

        // Get the old unit sum so as to substract from that day's account

        // $oldProfit = $purchase->profit;
        $oldUnit_sum = $purchase->unit_sum;
        $oldQuantity = $purchase->quantity;

        // Get that day's account
        $date = $purchase->created_at->toDateString();
        $dayAccount = Account::where('created_at', '=', $date)->get();

        // Substarct profit and unit_sum for that day
        // $dayAccount[0]->profit = $dayAccount[0]->profit - $oldProfit;
        $dayAccount[0]->expenses = $dayAccount[0]->expenses - $oldUnit_sum;

        // Get the product to obtain buying price & quantity
        $product = Product::find($purchase->product_id);
        
        // Return old quantity back to product
        $product->quantity = $product->quantity - $oldQuantity;
        
        
        // // Calculate new profit
        // $profit = ($formFields['price'] - $product->buying_price) * $formFields['quantity'];
        
        // Get new unit sum
        $unit_sum = $formFields['price'] * $formFields['quantity'];
        
        // Set new data
        $purchase->price = $formFields['price'];
        $purchase->quantity = $formFields['quantity'];
        $purchase->unit_sum = $unit_sum;
        $purchase->save();
        
        $product->quantity = $product->quantity + $purchase->quantity ;
        $product->save();

        // Work on account. Set new data

        $dayAccount[0]->expenses = $dayAccount[0]->expenses + $unit_sum;
                
        // if($profit > 0){
        //     $dayAccount[0]->profit = $dayAccount[0]->profit + $profit;
        // }else{
        //     $dayAccount[0]->loss = $dayAccount[0]->loss + $profit;
        // }

        $dayAccount[0]->save();

        return redirect('/purchases')->with('message', __("Update Succesful"));
    }

    // Delete purchase

    public function destroy(Purchase $purchase){

        // Reduce amount from daily account 

        // Get unit sum
        $oldUnit_sum = $purchase->unit_sum;
        $oldQuantity = $purchase->quantity;

        // Get that day's account
        $date = $purchase->created_at->toDateString();
        $dayAccount = Account::where('created_at', '=', $date)->get();

        // Reduce expense (unit_sum)
        $dayAccount[0]->expenses = $dayAccount[0]->expenses - $oldUnit_sum;
        $dayAccount[0]->save();        
        
        // Return old quantity back to product
        $product = Product::find($purchase->product_id);
        $product->quantity = $product->quantity - $oldQuantity;
        $product->save();

        $purchase->delete();
        return redirect('/purchases')->with('message', __("Delete Succesful"));
    }
}
