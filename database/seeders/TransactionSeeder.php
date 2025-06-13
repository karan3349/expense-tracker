<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'text' => 'Initial deposit',
            'amount' => 1000.00,
        ]);
        Transaction::create([
            'text' => 'Grocery shopping',
            'amount' => -150.75,
        ]);
        Transaction::create([
            'text' => 'Utility bill payment',
            'amount' => -200.00,
        ]);
        Transaction::create([
            'text' => 'Salary for June',
            'amount' => 3000.00,
        ]);
    }
}