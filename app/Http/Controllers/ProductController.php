<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show all products
    public function index(){
        return view('products', [
            'products' => Product::latest()->paginate(20)
        ]);
    }

    // Add Product
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'category' => 'sometimes',
        ]);

        Product::create($formFields);

        return redirect('/')->with('message', 'Bidhaa imeongezwa');
    }
}
