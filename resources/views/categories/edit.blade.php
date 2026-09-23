@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Edit Category</h1>

            <form action="{{ route('categories.update', $category->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $category->name }}"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>

                    <select
                        name="type"
                        id="type"
                        class="form-select"
                        required
                    >
                        <option value="income"
                            {{ $category->type == 'income' ? 'selected' : '' }}>
                            Income
                        </option>

                        <option value="expense"
                            {{ $category->type == 'expense' ? 'selected' : '' }}>
                            Expense
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Category
                </button>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">
                    Back to Categories
                </a>

            </form>

        </div>

    </div>

</div>

@endsection