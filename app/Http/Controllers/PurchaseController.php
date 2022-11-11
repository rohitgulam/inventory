<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // show all purchases
    public function index (){
        return view('purchases', [
            'purchases' => Purchase::latest()->paginate(20)
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

        // dd($orderArray[0]->name);

        foreach ($ordersArray as $order) {
            $order->description = $request->description;
            $order->credit = $request->credit;
            $order->purchase_from = $request->purchase_from;
            $order->purchase_by = $request->purchase_by;
            $orderArr = json_decode(json_encode($order), true);

            // dd($orderArr);
            Purchase::create($orderArr);

            $product = Product::find($order->product_id);

            $product->quantity = $product->quantity + $order->quantity;

            $product->save();
        }



        // Purchase::create($formFields);

        return redirect('/purchases')->with('message', 'Manunuzi yamefanyika kikamilifu');
    }

    // Search Product
    public function searchProduct(Request $request){
        $query = $request->get('searchQuery');
        
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        return json_encode( $products );
    }


}
