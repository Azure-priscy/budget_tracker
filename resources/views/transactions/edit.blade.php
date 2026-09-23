@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Edit Transaction</h1>

            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="amount" class="form-label">
                        Amount
                    </label>

                    <input
                        type="number"
                        name="amount"
                        id="amount"
                        value="{{ $transaction->amount }}"
                        class="form-control"
                        step="0.01"
                        min="0"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="transaction_date" class="form-label">
                        Transaction Date
                    </label>

                    <input
                        type="date"
                        name="transaction_date"
                        id="transaction_date"
                        value="{{ $transaction->transaction_date }}"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>

                    <input
                        type="text"
                        name="description"
                        id="description"
                        value="{{ $transaction->description }}"
                        class="form-control"
                    >
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">
                        Category
                    </label>

                    <select
                        name="category_id"
                        id="category_id"
                        class="form-select"
                        required
                    >
                        @foreach ($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ $transaction->category_id == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Transaction
                </button>

                <a href="{{ route('transactions.index') }}"
                   class="btn btn-secondary">
                    Back to Transactions
                </a>

            </form>

        </div>

    </div>

</div>

@endsection