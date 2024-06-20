<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("dashboard", compact("products"));
    }

    public function shopNow()
    {
        $products = Product::all();
        return view("shopnow", compact("products"));
    }

    public function getUserAppProduct()
    {
        // Get the ID of the authenticated user
        $userId = Auth::id();

        // Retrieve only the products added by the authenticated user
        $products = Product::where('user_id', $userId)->get();

        return view("products.index", compact("products"));
    }

    public function create()
    {
        $products = Product::all();
        return view("products.addproduct", compact("products"));
    }

    public function edit($Productid)
    {
        $product = Product::find($Productid);
        return view("products.edit", compact("product"));
    }

    public function update(Request $request, $Productid)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($Productid);
        $product->code = $validatedData['code'];
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];

        if ($request->hasFile('image')) {

            if ($product->image) {
                $oldImagePath = public_path('uploads/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy($Productid)
    {
        $product = Product::findOrFail($Productid);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->code = $validatedData['code'];
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];
        $product->user_id = Auth::id(); // Assign the authenticated user's ID

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $product->image = $imageName;
        }

        $product->save();
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }
}