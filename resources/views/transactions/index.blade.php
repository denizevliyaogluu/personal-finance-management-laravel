@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
    <br>
    <div class="row">
        <div class="col-md-3 ml-3">
            <div class="card" style="border-radius: 0;">
                <div class="card-body">
                    <form action="{{ route('transactions.filter') }}" method="GET">
                        @csrf
                        <div class="form-check" style="display: inline-block; margin-right: 10px;">
                            <input class="form-check-input" type="checkbox" name="type[]" value="income" id="income">
                            <label class="form-check-label" for="income">Income</label>
                        </div>
                        <div class="form-check" style="display: inline-block; margin-right: 10px;">
                            <input class="form-check-input" type="checkbox" name="type[]" value="expense" id="expense">
                            <label class="form-check-label" for="expense">Expense</label>
                        </div>
                        <hr>
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]"
                                    value="{{ $category->id }}" id="category-{{ $category->id }}">
                                <label class="form-check-label"
                                    for="category-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                        <hr>
                        <label for="currency">Currency:</label>
                        <select class="form-control" id="currency" name="currency_id">
                            <option value="">All</option>
                            @foreach ($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->code }})</option>
                            @endforeach
                        </select>
                        <hr>
                        <button type="submit" class="btn btn-dark mt-3 mx-auto d-block">Apply Filter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="border-radius: 0;">
                <div class="card-body">
                    <a href="{{ route('transactions.create') }}" class="btn btn-dark mb-3">Add Transaction</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-dark mb-3">Category Management</a>
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userTransactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->amount }} {{ $transaction->currency->symbol }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    @if ($transaction->category)
                                        <td>{{ $transaction->category->name }}</td>
                                    @else
                                        <td>No Category</td>
                                    @endif
                                    <td>{{ $transaction->description }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>
                                        <form action="{{ route('transactions.destroy', $transaction) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark">Delete</button>
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
    <br>
@endsection
<link href="{{ asset('assets') }}/system/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets') }}/system/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('assets') }}/system/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('assets') }}/system/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
    rel="stylesheet" type="text/css" />
<script src="{{ asset('assets') }}/system/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('assets') }}/system/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script>
    $('#basic-datatable').DataTable();
</script>
