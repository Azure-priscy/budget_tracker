@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-body">

            <h1 class="mb-4">Category Details</h1>

            <div class="mb-3">
                <h6 class="text-muted">Name</h6>
                <p class="fs-5">{{ $category->name }}</p>
            </div>

            <div class="mb-3">
                <h6 class="text-muted">Type</h6>

                @if ($category->type === 'income')
                    <span class="badge bg-success">
                        Income
                    </span>
                @else
                    <span class="badge bg-danger">
                        Expense
                    </span>
                @endif

            </div>

            <a href="{{ route('categories.index') }}"
               class="btn btn-secondary">
                Back to Categories
            </a>

        </div>

    </div>

</div>

@endsection