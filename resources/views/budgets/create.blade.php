@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Create Budget</h1>

            <form action="{{ route('budgets.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label for="monthly_limit" class="form-label">
                        Monthly Amount Limit
                    </label>

                    <input
                        type="number"
                        name="monthly_limit"
                        id="monthly_limit"
                        class="form-control"
                        step="0.01"
                        min="0"
                        requiredu
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
                        <option value="" disabled selected>
                            Select Category
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }} 
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Create Budget
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