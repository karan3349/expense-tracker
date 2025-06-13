<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions along with calculated financial metrics.
     *
     * Retrieves the latest transactions and calculates the total income, expenses, 
     * and balance to display on the transactions index view
     */

    public function index():View
    {
        $transactions = Transaction::latest()->get();
        $income = Transaction::where('amount', '>', 0)->sum('amount');
        $expenses = Transaction::where('amount', '<', 0)->sum('amount');
        $balance = $income + $expenses;

        return View('transactions.index', compact('transactions', 'income', 'expenses', 'balance'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Transaction::create($request->only('text', 'amount'));

        return redirect()->back()->with('success', 'Transaction added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     */
    public function destroy(Transaction $transaction):RedirectResponse
    {
        $transaction->delete();

        return redirect()->back()->with('success', 'Transaction deleted successfully.');
    }
    

}