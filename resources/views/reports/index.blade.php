@extends('layouts.master')

@section('title', 'Expenses and Incomes Report')

@section('content')
    <div class="container">
        <br>
        <form method="GET" action="{{ route('reports.index') }}" class="form-inline">
            <div class="form-group mr-2">
                <select name="filter" id="filter" class="form-control">
                    <option value="daily" {{ $filter == 'daily' ? 'selected' : '' }}>Daily</option>
                    <option value="weekly" {{ $filter == 'weekly' ? 'selected' : '' }}>Weekly</option>
                    <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    <option value="yearly" {{ $filter == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    <option value="custom" {{ $filter == 'custom' ? 'selected' : '' }}>Select Date</option>
                </select>
            </div>
            <div class="form-group mr-2" id="customDateRange" style="{{ $filter == 'custom' ? '' : 'display: none;' }}">
                <input type="date" name="custom_date" id="custom_date" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark">Filter</button>
        </form>

        <div class="mt-4">
            <h2>{{ ucfirst($filter) }} Report</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Items</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Incomes</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal"
                                data-target="#incomeModal">
                                <i class="fas fa-eye"></i> View Transactions
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Expenses</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal"
                                data-target="#expenseModal">
                                <i class="fas fa-eye"></i> View Transactions
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="incomeModal" tabindex="-1" role="dialog" aria-labelledby="incomeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="incomeModalLabel">Income Transactions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($incomeTransactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->amount }} {{ $transaction->currency->symbol }}</td>
                                        <td>{{ $transaction->category->name }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expense Modal -->
        <div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="expenseModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expenseModalLabel">Expense Transactions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenseTransactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->amount }} {{ $transaction->currency->symbol }}</td>
                                        <td>{{ $transaction->category->name }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
