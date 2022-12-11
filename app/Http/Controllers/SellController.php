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
        return view('sells', [
            'sells' => Sell::whereDate('created_at', '>=', $query)->get()
        ]);
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

    public function print(){
        return view ('print', [
            'sells' => Sell::latest()->paginate(20)
        ]);
    }
}
