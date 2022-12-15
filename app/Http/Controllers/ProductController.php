<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // show all products
    public function index(){
        return view('products', [
            'products' => Product::where('deleted', '=', 0)->get()
        ]);
    }

    // Search Product
    public function searchProduct(Request $request){
        $query = $request->get('searchQuery');
        
        $products = Product::where('name', 'like', '%' . $query . '%')->where('deleted', '=', 0)->get();

        return json_encode( $products );
    }

    // Add Product
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'category' => 'sometimes',
            'branch' => 'string|required',
            'quality' => 'string',
            'metric' => 'string',
            'selling_price' => 'integer',
            'buying_price' => 'integer|sometimes ',
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
            'selling_price' => 'integer|sometimes', 
            'buying_price' => 'integer|sometimes', 
            'category' => 'sometimes',
        ]);

        $product->update($formFields);

        return redirect('/products')->with('message', 'Bidhaa imebadilishwa');
    }

    // Delete product
    public function destroy(Product $product){
        
        $product->deleted = 1;

        $product->save();

        return redirect('/products')->with('message', 'Bidhaa imefutwa');


    }

    // Dealing with bonus

    // // Show add bonus form
    // public function editBonus(Product $product  ){
    //     return view('add-bonus', ['product' => $product]);
    // }

    // // Add Bonus
    // public function addBonus(Request $request, Product $product){
    //     $formFields = $request->validate([
    //         'quantity' => 'required|integer'
    //     ]);

    //     $formFields['quantity'] = $formFields['quantity'] + $product->quantity;

    //     $product->update($formFields);

    //     return redirect('/products')->with('message', 'Bonus imeongezwa');
    // }


}
