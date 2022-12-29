<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Account;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\Type\NullType;

class SellController extends Controller
{
    // show 
    public function index(Request $request){
        $query = Carbon::now();
        $items = Sell::whereDate('created_at', '>=', $query)->get();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
                $items = Sell::whereDate('created_at', '=', $query)->get();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
                $items = Sell::whereDate('created_at', '>=', $query)->get();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
                $items = Sell::whereDate('created_at', '>=', $query)->get();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
                $items = Sell::whereDate('created_at', '>=', $query)->get();
            }
        }
        return view('sells', [
            'sells' => $items
        ]);
    }

    public function print(Request $request){
        $query = Carbon::now();
        $items = Sell::whereDate('created_at', '>=', $query)->get();

        if($request->all()){
            $time = $request->all()['time-filter'];

            if($time == 'yesterday'){
                $query = Carbon::now()->subDay();
                $items = Sell::whereDate('created_at', '=', $query)->get();
            } elseif ($time == 'week') {
                $query = Carbon::now()->subWeek();
                $items = Sell::whereDate('created_at', '>=', $query)->get();
            } elseif($time == 'month'){
                $query = Carbon::now()->subMonth();
                $items = Sell::whereDate('created_at', '>=', $query)->get();
            }elseif($time == 'year'){
                $query = Carbon::now()->subYear();
                $items = Sell::whereDate('created_at', '>=', $query)->get();
            }
        }
        return view('print.print', [
            'sells' => $items
        ]);
        // return view ('print.print', [
        //     'sells' => Sell::latest()->paginate(20)
        // ]);
    }

    // Show make sell form 

    public function create(){
        return view('make-sell');
    }

    public function store(Request $request){
        $currentDate = date('Y-m-d');
        $todaysAccount = Account::where('created_at', '=', $currentDate)->get();
        $tempProfitHolder = 0 ;

        $order = $request->orders;

        $ordersArray = json_decode($order);

        foreach ($ordersArray as $order) {
            $product = Product::find($order->product_id);

            $productProfit = ($order->price - $product->buying_price) * $order->quantity;


            $order->description = $request->description;
            $order->credit = $request->credit;
            $order->sell_to = $request->sell_to;
            $order->sell_by = $request->sell_by;
            $order->profit = $productProfit;
            $order->paid_amount = $order->credit == 0 ? NULL : 0;
            $orderArr = json_decode(json_encode($order), true);
            $tempProfitHolder += $productProfit ;
            
            Sell::create($orderArr);
            
            $product->quantity = $product->quantity - $order->quantity;
            $product->save();

        }
        
        if ($order->credit == 0) {
            if ($todaysAccount->isEmpty()) {
                Account::create([
                    'revenue' => $request->order_sum,
                    'profit' => $tempProfitHolder,
                ]);
            } else {
                $todaysAccount[0]->revenue = $todaysAccount[0]->revenue + $request->order_sum;
                

                if($tempProfitHolder > 0){
                    $todaysAccount[0]->profit = $todaysAccount[0]->profit + $tempProfitHolder;
                }else{
                    $todaysAccount[0]->loss = $todaysAccount[0]->loss + $tempProfitHolder;
                }
    
                $todaysAccount[0]->save();
            }
        }

        return redirect('/sells')->with('message', 'Mauzo yamefanyika kikamilifu');
    }

    public function edit(Sell $sell){
        return view('sells/edit', ['product' => $sell]);
    }

    public function update(Request $request, Sell $sell){

        $formFields = $request->validate([
            'quantity' => 'required|integer',
            'price' => 'required|integer'
        ]);

        // Get the old profit and unit sum so as to substract from that day's account

        $oldProfit = $sell->profit;
        $oldUnit_sum = $sell->unit_sum;
        $oldQuantity = $sell->quantity;

        // Get that day's account
        $date = $sell->created_at->toDateString();
        $dayAccount = Account::where('created_at', '=', $date)->get();

        // Substarct profit and unit_sum for that day
        $dayAccount[0]->profit = $dayAccount[0]->profit - $oldProfit;
        $dayAccount[0]->revenue = $dayAccount[0]->revenue - $oldUnit_sum;
        // Get the product to obtain buying price & quantity
        $product = Product::find($sell->product_id);
        
        // Return old quantity back to product
        $product->quantity = $product->quantity + $oldQuantity;
        
        
        // Calculate new profit
        $profit = ($formFields['price'] - $product->buying_price) * $formFields['quantity'];
        
        // Get new unit sum
        $unit_sum = $formFields['price'] * $formFields['quantity'];
        
        // Set new data
        $sell->price = $formFields['price'];
        $sell->quantity = $formFields['quantity'];
        $sell->unit_sum = $unit_sum;
        $sell->profit = $profit;
        $sell->save();
        
        $product->quantity = $product->quantity - $sell->quantity ;
        $product->save();

        // Work on account. Set new data

        $dayAccount[0]->revenue = $dayAccount[0]->revenue + $unit_sum;
                
        if($profit > 0){
            $dayAccount[0]->profit = $dayAccount[0]->profit + $profit;
        }else{
            $dayAccount[0]->loss = $dayAccount[0]->loss + $profit;
        }

        $dayAccount[0]->save();

        return redirect('/sells')->with('message', __("Update Succesful"));
    }

    public function destroy(Sell $sell){

        // Reduce amount from daily account 

        // Get profit and unit sum
        $oldProfit = $sell->profit;
        $oldUnit_sum = $sell->unit_sum;
        $oldQuantity = $sell->quantity;

        // Get that day's account
        $date = $sell->created_at->toDateString();
        $dayAccount = Account::where('created_at', '=', $date)->get();

        // Reduce revenue (unit_sum)
        $dayAccount[0]->revenue = $dayAccount[0]->revenue - $oldUnit_sum;
        
        // Reduce profit
        $dayAccount[0]->profit = $dayAccount[0]->profit - $oldProfit;
        $dayAccount[0]->save();        
        
        // Return old quantity back to product
        $product = Product::find($sell->product_id);
        $product->quantity = $product->quantity + $oldQuantity;
        $product->save();

        $sell->delete();
        return redirect('/sells')->with('message', __("Delete Succesful"));
    }

}
