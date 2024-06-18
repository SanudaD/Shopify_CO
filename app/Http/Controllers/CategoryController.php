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

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        ProductCategory::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show( ProductCategory $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit( ProductCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request,  ProductCategory $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy( ProductCategory $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
