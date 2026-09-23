@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Transactions</h1>

        <a href="{{ route('transactions.create') }}"
           class="btn btn-primary">
            Add Transaction
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($transactions as $transaction)

                            <tr>

                                <td>
                                    GHS {{ number_format($transaction->amount, 2) }}
                                </td>

                                <td>
                                    {{ $transaction->transaction_date }}
                                </td>

                                <td>
                                    {{ $transaction->description }}
                                </td>

                                <td>
                                    {{ $transaction->category->name ?? 'Uncategorized' }}
                                </td>

                                <td>

                                    <a href="{{ route('transactions.show', $transaction->id) }}"
                                       class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <a href="{{ route('transactions.edit', $transaction->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('transactions.destroy', $transaction->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection