@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            Create New Category
        </a>
    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($categories as $category)

                            <tr>
                                <td>{{ $category->name }}</td>

                                <td>
                                    @if ($category->type === 'income')
                                        <span class="badge bg-success">
                                            Income
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Expense
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <a href="{{ route('categories.show', $category->id) }}"
                                       class="btn btn-sm btn-info">
                                        View
                                    </a>

                                    <form action="{{ route('categories.destroy', $category->id) }}"
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