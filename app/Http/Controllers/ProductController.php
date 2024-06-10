<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller

{
    public function index(){
        $products = Product::all();
        return view("dashboard",compact("products"));
    }


    public function getUserAppProduct(){
    // Get the ID of the authenticated user
    $userId = Auth::id();

    // Retrieve only the products added by the authenticated user
    $products = Product::where('user_id', $userId)->get();

    return view("products.index", compact("products"));
}

    public function create(){
        $products = Product::all();
        return view ("products.addproduct",compact("products"));
    }

    public function edit($Productid){
        $product = Product::find($Productid);
        return view("products.edit", compact("product"));
    }

    public function update(Request $request,$Productid){
        $validatedData = $request->validate([
            'code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        $product = Product::findOrFail($Productid);
        $product->code = $validatedData['code'];
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];

          $product->save();
          return redirect()->route('products.index')
          ->with('success', 'Product updated successfully.');

    }

    public function destroy($Productid){
        $product = Product::findOrFail($Productid);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');

    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
        ]);
        $product = new Product();
        $product->code = $validatedData['code'];
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];
        $product->user_id = Auth::id(); // Assign the authenticated user's ID
        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');


    }}
