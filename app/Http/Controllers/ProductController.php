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
            'quality' => 'string',
            'metric' => 'string',
            'selling_price' => 'integer',
            'bonus' => 'integer',
            'quantity' => 'sometimes|integer',
        ]);

        Product::create($formFields);

        return redirect()->back()->with('message', 'Bidhaa imeongezwa');
    }

    // Show edit form 
    public function edit(Product $product){
        return view('edit-product', ['product' => $product]);
    }

    // Update form
    public function update(Request $request, Product $product){

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'quantity' => 'integer|sometimes', 
            'category' => 'sometimes',
        ]);

        $product->update($formFields);

        return redirect('/products')->with('message', 'Bidhaa imebadilishwa');
    }

    // Delete product
    public function destroy(Product $product){
        
        $product->delete();

        return redirect('/products')->with('message', 'Bidhaa imefutwa');


    }


}
