<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // show all purchases
    public function index (){
        return view('purchases');
    }

    // Show create form 
    public function create(){
        return view('make-purchase');
    }

    // Create a purchases
    public function store(Request $request){
        $formFields = $request->validate([
            'product' => 'required|string',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
            'credit' => 'required|integer',
            'purhcase_from' => 'required|string',
            'purchase_by' => 'required|string',
        ]);

        Purchase::create($formFields);

        return redirect('/purchases')->with('message', 'Manunuzi yamefanyika kikamilifu');
    }
}
