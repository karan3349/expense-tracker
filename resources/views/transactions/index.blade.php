<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .income {
        color: green;
    }

    .expense {
        color: red;
    }
    </style>
</head>

<body class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Expense Tracker</h2>
        <div class="text-center mb-3">
            <h4>Your Balance</h4>
            <h1>${{ number_format($balance, 2) }}</h1>
        </div>

        <div class="d-flex justify-content-center gap-4 mb-4">
            <div class="p-3 bg-white shadow rounded">
                <h5 class="text-success">INCOME</h5>
                <p>${{ number_format($income, 2) }}</p>
            </div>
            <div class="p-3 bg-white shadow rounded">
                <h5 class="text-danger">EXPENSE</h5>
                <p>${{ number_format($expenses, 2) }}</p>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h5>History</h5>
        <ul class="list-group">
            @foreach ($transactions as $txn)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $txn->text }}
                <div>
                    <span class="{{ $txn->amount > 0 ? 'income' : 'expense' }}">
                        {{ $txn->amount > 0 ? '+' : '-' }}${{ number_format(abs($txn->amount), 2) }}
                    </span>
                    <form action="{{ route('transactions.destroy', $txn->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger ms-2">x</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

    <div>
        <h5>Add new transaction</h5>
        <form method="POST" action="{{ route('transactions.store') }}">
            @csrf
            <div class="mb-2">
                <input type="text" name="text" class="form-control" placeholder="Enter text..." required>
            </div>
            <div class="mb-2">
                <input type="number" step="any" name="amount" class="form-control" placeholder="Enter amount..."
                    required>
            </div>
            <button class="btn btn-primary">Add transaction</button>
        </form>
    </div>
</body>

</html>