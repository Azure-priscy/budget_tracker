@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Budget Details</h1>

            <div class="mb-3">
                <h6 class="text-muted">Monthly Amount Limit</h6>
                <p class="fs-5">
                    GHS {{ number_format($budget->monthly_limit, 2) }}
                </p>
            </div>

            <div class="mb-3">
                <h6 class="text-muted">Start Date</h6>
                <p class="fs-5">
                    {{ $budget->start_date }}
                </p>
            </div>

            <div class="mb-3">
                <h6 class="text-muted">End Date</h6>
                <p class="fs-5">
                    {{ $budget->end_date }}
                </p>
            </div>

            <div class="mb-4">
                <h6 class="text-muted">Category</h6>
                <p class="fs-5">
                    {{ $budget->category->name }}
                </p>
            </div>

            <a href="{{ route('budgets.edit', $budget->id) }}"
               class="btn btn-warning">
                Edit Budget
            </a>

            <form action="{{ route('budgets.destroy', $budget->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button type="submit"
                        class="btn btn-danger">
                    Delete Budget
                </button>

            </form>

            <a href="{{ route('budgets.index') }}"
               class="btn btn-secondary">
                Back to Budgets
            </a>

        </div>

    </div>

</div>

@endsection