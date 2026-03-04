<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpensesRquest;
use App\Http\Requests\UpdateExpensesRquest;
use App\Models\Category;
use App\Models\Colocation;
use App\Models\Expense;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $expenses = Expense::with(['colocation', 'payer', 'category', 'payments'])->get();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colocation = Colocation::whereHas('users' , function($query){
            $query->where('user_id',Auth::id());
        })->first();
        
        $categories = Category::all();

        return view('expenses.create', compact('colocation', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpensesRquest $request)
    {
        $expense = Expense::create($request->validated());

        $colocation = Colocation::with('users')->findOrFail($request->colocation_id);
        $members = $colocation->users;
        $memberCount = $members->count();

        $share = $expense->amount / $memberCount;

        foreach ($members as $member) {
            if ($member->id != $expense->payer_id) {
                Payment::create([
                    'expense_id'     => $expense->id,
                    'colocations_id' => $expense->colocation_id,
                    'from_user_id' => $member->id,
                    'to_user_id' => $expense->payer_id,
                    'amount' => $share
                ]);
            }
        }

        return redirect()->route('expenses.index')
            ->with('success', 'Expense created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        $expense->load(['payments', 'payer', 'colocation', 'category']);
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $colocations = Colocation::with('users')->get();
        $categories = Category::all();

        return view('expenses.edit', compact('expense', 'colocations', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpensesRquest $request, Expense $expense)
    {
        $expense->update($request->validated());

        $expense->payments()->delete();

        $colocation = Colocation::with('users')->findOrFail($request->colocation_id);
        $members = $colocation->users;
        $memberCount = $members->count();

        $share = $expense->amount / $memberCount;

        foreach ($members as $member) {
            if ($member->id != $expense->payer_id) {
                Payment::create([
                    'expense_id'     => $expense->id,
                    'colocations_id' => $expense->colocation_id,
                    'from_user_id'   => $member->id,
                    'to_user_id'     => $expense->payer_id,
                    'amount'         => $share,
                ]);
            }
        }

        return redirect()->route('expenses.index')
            ->with('success', 'Expense updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->payments()->delete();
        $expense->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully');
    }

}
