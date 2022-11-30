<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Account;
use App\Models\Product;
use Illuminate\Http\Request;
use SebastianBergmann\Type\NullType;

class SellController extends Controller
{
    // show 
    public function index(){
        return view('sells', [
            'sells' => Sell::latest()->paginate(20)
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
        // dd($tempProfitHolder);



        if ($order->credit == 0) {
            if ($todaysAccount->isEmpty()) {
                Account::create([
                    'revenue' => $request->order_sum,
                ]);
            } else {
                $todaysAccount[0]->revenue = $todaysAccount[0]->revenue + $request->order_sum;
                $todaysAccount[0]->profit = $todaysAccount[0]->profit + $tempProfitHolder;
    
                $todaysAccount[0]->save();
            }
        }

        return redirect('/sells')->with('message', 'Mauzo yamefanyika kikamilifu');
    }
}
