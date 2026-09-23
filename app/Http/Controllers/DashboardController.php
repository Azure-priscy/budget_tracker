<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Budget;

class DashboardController extends Controller
{
    //expense summary
    public function index(Request $request){
        
        // Current month by default, or use the month selected by the user
        $selectedMonth = $request->input('month', now()->format('Y-m'));

        $year = Carbon::parse($selectedMonth)->year;
        $month = Carbon::parse($selectedMonth)->month;

        // Convert selected month into date boundaries
        $startDate = Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m', $selectedMonth)->endOfMonth();

        // Total income
       /* $income = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->where('transaction_type', 'income')
            ->sum('amount');*/

        $income = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->whereHas('category', function ($query) {
                $query->where('type', 'income');
            })
            ->sum('amount');

        // Total expenses
        $expense = Transaction::whereBetween('transaction_date', [$startDate, $endDate])
            ->whereHas('category', function ($query) {
                $query->where('type', 'expense');
            })
            ->sum('amount');

        // Balance
        $balance = $income - $expense;


    // Get transactions for the selected month
    $filteredTransactions = Transaction::whereYear('transaction_date', $year)
        ->whereMonth('transaction_date', $month)
        ->get();


        //charts
    $financialHistory = Transaction::with('category')
    ->get()
    ->groupBy(function ($transaction) {
        return Carbon::parse($transaction->transaction_date)->format('Y-m');
    });

    $months = [];
    $incomeData = [];
    $expenseData = [];

    foreach ($financialHistory as $month => $transactions) {

        $months[] = Carbon::createFromFormat('Y-m', $month)
            ->format('M Y');

        $incomeData[] = $transactions
            ->filter(function ($transaction) {
                return $transaction->category->type === 'income';
            })
            ->sum('amount');

        $expenseData[] = $transactions
            ->filter(function ($transaction) {
                return $transaction->category->type === 'expense';
            })
            ->sum('amount');
    }

    //pie chart data

    $spendingByCategory = $filteredTransactions
    ->filter(function ($transaction) {
        return $transaction->category->type === 'expense';
    })
    ->groupBy(function ($transaction) {
        return $transaction->category->name;
    })
    ->map(function ($transactions) {
        return $transactions->sum('amount');
    });

    //recent transactions
    $recentTransactions = Transaction::with('category')
    ->latest('transaction_date')
    ->take(5)
    ->get();

        return view('dashboard', compact(
            'selectedMonth',
            'income',
            'expense',
            'balance',
            'filteredTransactions',
            'months',
            'incomeData',
            'expenseData',
            'spendingByCategory',
            'recentTransactions'
        ));
    }
}
