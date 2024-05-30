<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pets;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $filter = $request->input('filter', 'daily');

            switch ($filter) {
                case 'daily':
                    $expenses = Transaction::getDailyExpenses($userId);
                    $incomes = Transaction::getDailyIncomes($userId);
                    $expenseTransactions = Transaction::getDailyExpenseTransactions($userId);
                    $incomeTransactions = Transaction::getDailyIncomeTransactions($userId);
                    break;
                case 'weekly':
                    $expenses = Transaction::getWeeklyExpenses($userId);
                    $incomes = Transaction::getWeeklyIncomes($userId);
                    $expenseTransactions = Transaction::getWeeklyExpenseTransactions($userId);
                    $incomeTransactions = Transaction::getWeeklyIncomeTransactions($userId);
                    break;
                case 'monthly':
                    $expenses = Transaction::getMonthlyExpenses($userId);
                    $incomes = Transaction::getMonthlyIncomes($userId);
                    $expenseTransactions = Transaction::getMonthlyExpenseTransactions($userId);
                    $incomeTransactions = Transaction::getMonthlyIncomeTransactions($userId);
                    break;
                case 'yearly':
                    $expenses = Transaction::getYearlyExpenses($userId);
                    $incomes = Transaction::getYearlyIncomes($userId);
                    $expenseTransactions = Transaction::getYearlyExpenseTransactions($userId);
                    $incomeTransactions = Transaction::getYearlyIncomeTransactions($userId);
                    break;
                case 'custom':
                    // Custom date transactions
                    $customDate = $request->input('custom_date');
                    $expenses = Transaction::getCustomExpenses($userId, $customDate);
                    $incomes = Transaction::getCustomIncomes($userId, $customDate);
                    $expenseTransactions = Transaction::getCustomExpenseTransactions($userId, $customDate);
                    $incomeTransactions = Transaction::getCustomIncomeTransactions($userId, $customDate);
                    break;
                default:
                    $expenses = 0;
                    $incomes = 0;
                    $expenseTransactions = [];
                    $incomeTransactions = [];
                    break;
            }

            $profitOrLoss = $incomes - $expenses;

            return view('reports.index', compact('expenses', 'incomes', 'profitOrLoss', 'filter', 'expenseTransactions', 'incomeTransactions'));
        } else {
            return redirect()->route('login');
        }
    }
}
