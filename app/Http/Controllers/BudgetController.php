<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $budgets = budget::all();
        return view('budgets.index', compact('budgets'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('budgets.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'monthly_limit' => 'required|numeric',
        ]);

        budget::create($request->all());

        return redirect()->route('budgets.index')
            ->with('success', 'Budget created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(budget $budget)
    {
    
        return view('budgets.show', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(budget $budget)
    {
        $categories = Category::all();
        return view('budgets.edit', compact('budget','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, budget $budget)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'monthly_limit' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $budget->update($request->all());

        return redirect()->route('budgets.index')
            ->with('success', 'Budget updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(budget $budget)
    {
        $budget->delete();

        return redirect()->route('budgets.index')
            ->with('success', 'Budget deleted successfully.');
    }
}
