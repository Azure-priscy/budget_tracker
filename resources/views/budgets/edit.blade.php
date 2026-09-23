@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Edit Budget</h1>

            <form action="{{ route('budgets.update', $budget->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="monthly_limit" class="form-label">
                        Monthly Amount Limit
                    </label>

                    <input
                        type="number"
                        name="monthly_limit"
                        id="monthly_limit"
                        value="{{ $budget->monthly_limit }}"
                        class="form-control"
                        step="0.01"
                        min="0"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="start_date" class="form-label">
                        Start Date
                    </label>

                    <input
                        type="date"
                        name="start_date"
                        id="start_date"
                        value="{{ $budget->start_date }}"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">
                        End Date
                    </label>

                    <input
                        type="date"
                        name="end_date"
                        id="end_date"
                        value="{{ $budget->end_date }}"
                        class="form-control"
                        required
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
                                {{ $budget->category_id == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Budget
                </button>

                <a href="{{ route('budgets.index') }}"
                   class="btn btn-secondary">
                    Back to Budgets
                </a>

            </form>

        </div>

    </div>

</div>

@endsection