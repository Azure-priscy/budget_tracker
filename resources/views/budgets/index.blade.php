@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Manage Budgets</h1>

        <a href="{{ route('budgets.create') }}"
           class="btn btn-primary">
            Create New Budget
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Category</th>
                            <th>Monthly Amount Limit</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($budgets as $budget)

                            <tr>

                                <td>
                                    {{ $budget->category->name }}
                                </td>

                                <td>
                                    GHS {{ number_format($budget->monthly_limit, 2) }}
                                </td>

                                <td>
                                    {{ $budget->start_date }}
                                </td>

                                <td>
                                    {{ $budget->end_date }}
                                </td>

                                <td>

                                    <a href="{{ route('budgets.show', $budget->id) }}"
                                       class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <a href="{{ route('budgets.edit', $budget->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('budgets.destroy', $budget->id) }}"
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