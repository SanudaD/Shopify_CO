<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $categories = ProductCategory::all();

        return view('products.index', compact('products', 'categories'));
    }

    
    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_code', 'product_category_code');
    }

    public function category()
{
    return $this->belongsTo(ProductCategory::class, 'product_category_code', 'code');
}
    

    public function shopNow()
    {
        $products = Product::all();
        return view("shopnow", compact("products"));
    }

    public function getUserAppProduct()
    {
        //Get the ID of the authenticated user
        $userId = Auth::id();

        // Retrieve only the products added by the authenticated user
        $products = Product::where('user_id', $userId)->get();
        $categories = ProductCategory::all();


        return view("products.index", compact("products", "categories"));

    }


    public function create()
{
    $categories = ProductCategory::all();
    $products = Product::all();
    return view("products.addproduct", compact("categories", "products"));
}

public function edit($Productid)
{
    $product = Product::find($Productid);
    $categories = ProductCategory::all();
    return view("products.edit", compact("product", "categories"));
}


    public function update(Request $request, $Productid)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);

        $product = Product::findOrFail($Productid);
        $product->code = $validatedData['code'];
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];  
        $product->product_category_code = $validatedData['product_category'];

        // Handle the image upload...

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
            'code' => 'required|integer|unique:table_products,code', 
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|min:0',
            'product_category' => 'required|integer|exists:table_categories,product_category_code',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000', 
        ]);

        $product = new Product();
        $product->code = $validatedData['code'];
        $product->product_name = $validatedData['product_name'];
        $product->product_price = $validatedData['product_price'];
        $product->product_category_code = $validatedData['product_category'];
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