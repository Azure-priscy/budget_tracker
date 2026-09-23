@extends('layouts.base')

@section('content')
   

<div><form method="GET" action="{{ route('dashboard') }}">
        <label for="month">Select Month:</label>

    <input
        type="month"
        name="month"
        id="month"
        value="{{ $selectedMonth ?? now()->format('Y-m') }}"
    >

    <button type="submit">apply Filter</button>
</form>
</div>

<div class="row mb-3">

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Income</h6>
                <h4>GHS {{ number_format($income, 2) }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Expenses</h6>
                <h4>GHS {{ number_format($expense, 2) }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h6>Balance</h6>
                <h4>GHS {{ number_format($balance, 2) }}</h4>
            </div>
        </div>
    </div>

</div>


<!-- Display line chart -->
<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Financial History</h5>

                <div id="financialHistoryChart"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Monthly Spending by Category</h5>

                <div id="spendingByCategoryChart"></div>
            </div>
        </div>
    </div>

</div>

<!-- Display recent transactions -->

    <div class="card mt-3">
    <div class="card-body">

        <h5>Recent Transactions</h5>

        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Amount</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recentTransactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_date }}</td>
                        <td>{{ $transaction->category->name }}</td>
                        <td>GHS {{ number_format($transaction->amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    const months = @json($months);
    const incomeData = @json($incomeData);
    const expenseData = @json($expenseData);

    const options = {
        chart: {
            type: 'line',
            height: 200
        },

        series: [
            {
                name: 'Income',
                data: incomeData
            },
            {
                name: 'Expenses',
                data: expenseData
            }
        ],

        xaxis: {
            categories: months
        },

        yaxis: {
            title: {
                text: 'Amount'
            }
        },

        stroke: {
            curve: 'smooth'
        }
    };

    const chart = new ApexCharts(
        document.querySelector("#financialHistoryChart"),
        options
    );

    chart.render();

    // Pie chart for spending by category
    

    const spendingCategories = @json($spendingByCategory->keys()->values());
    const spendingAmounts = @json($spendingByCategory->values()->values());

    const pieOptions = {
        chart: {
            type: 'pie',
            height: 200
        },

        series: spendingAmounts,

        labels: spendingCategories
    };

    const pieChart = new ApexCharts(
        document.querySelector("#spendingByCategoryChart"),
        pieOptions
    );

    pieChart.render();

</script>




@endsection