@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Transaction Details</h1>

            <div class="mb-3">
                <h6 class="text-muted">Amount</h6>
                <p class="fs-5">
                    GHS {{ number_format($transaction->amount, 2) }}
                </p>
            </div>

            <div class="mb-3">
                <h6 class="text-muted">Date</h6>
                <p class="fs-5">
                    {{ $transaction->transaction_date }}
                </p>
            </div>

            <div class="mb-3">
                <h6 class="text-muted">Description</h6>
                <p class="fs-5">
                    {{ $transaction->description }}
                </p>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">Category</h6>
                <p class="fs-5">
                    {{ $transaction->category->name ?? 'Uncategorized' }}
                </p>
            </div>

            <a href="{{ route('transactions.edit', $transaction->id) }}"
               class="btn btn-warning">
                Edit Transaction
            </a>

            <a href="{{ route('transactions.index') }}"
               class="btn btn-secondary">
                Back to Transactions
            </a>

        </div>

    </div>

</div>

@endsection