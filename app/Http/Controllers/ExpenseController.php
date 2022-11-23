<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // show all
    // public function index(){
    //     return view('expenses', [
    //         'expenses' => Expense::latest()->paginate(20)
    //     ]);
    // }

    // show create expense form 
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'string|required'
        ]);

        Expense::create($formFields);

        return redirect()->back()->with('message', 'Matumizi yameongezwa');
    }
    
}
