<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Tracker</title>

    <div class="top-header d-flex justify-content-between align-items-center">

    <h3 class="mb-0">Personal Budget Tracker</h3>

    @unless(request()->routeIs('dashboard'))
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">
            ← Back to Dashboard
        </a>
    @endunless

</div>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #02275f;
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.2);
            color: white;
        }

        .sidebar .brand {
            color: white;
            font-weight: bold;
            font-size: 1.4rem;
        }

        .content-area {
            flex: 1;
            padding: 20px;
        }

        .top-header {
            background: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        }
    </style>

</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar p-3">

        <div class="brand mb-4">
            Budget Tracker
        </div>

        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('transactions.index') }}">
                     Transactions
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                     Categories
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('budgets.index') }}">
                     Budgets
                </a>
            </li>

        </ul>

    </div>

    <!-- Main Content -->
    <div class="content-area">

        

        @yield('content')

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
