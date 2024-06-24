<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('categories.index', compact('categories'));
    }

    public function showProducts(ProductCategory $category)
    {
        return view('categories.products', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_code' => 'required|integer|unique:table_categories,product_category_code', // Check for uniqueness
            'category_name' => 'required|string|max:255',
        ], [
            'category_code.integer' => 'The category code must be a number.',
            'category_code.unique' => 'The category code has already been taken.', // Custom error message for unique validation
        ]);

        $category = new ProductCategory();
        $category->product_category_code = $validatedData['category_code'];
        $category->category_name = $validatedData['category_name'];
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(ProductCategory $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(ProductCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
{
    $request->validate([
        'category_code' => 'required',
        'category_name' => 'required'
    ]);

    // Check if there are associated products
    if ($category->products()->exists()) {

        $category->products()->update(['product_category_code' => NULL]);
    }

    // Proceed with updating the category
    $category->update([
        'product_category_code' => $request->category_code,
        'category_name' => $request->category_name
    ]);

    return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
}

    public function destroy(ProductCategory $category)
    {
        if ($category->products()->exists()) {
            $category->products()->update(['product_category_code' => NULL]);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
    
}
