<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransactionController;



Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');