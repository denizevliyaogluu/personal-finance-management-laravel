@extends('layouts.master')
@section('title', 'Homepage')
@section('content')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Personal Finance Manager: A Comprehensive Tool for Achieving Your Financial Goals</h2>

                    <p>Personal finance management helps individuals effectively track their incomes and expenses, create budgets, and reach financial goals. Our website, "Personal Finance Manager," offers a comprehensive platform designed for this purpose. Here are the features we provide:</p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Income and Expense Tracking:</strong> Easily input, edit, and track each income and expense item. This allows you to see your financial situation in real-time and track developments.</li>
                        <li class="list-group-item"><strong>Categorization and Filtering:</strong> Categorize your incomes and expenses for better visualization. Additionally, you can filter by income or expense categories for more detailed analysis.</li>
                        <li class="list-group-item"><strong>Budget Creation and Monitoring:</strong> Create your personal budget and track your expenses to achieve your goals. You'll also receive alerts when your budget is exceeded, allowing you to take necessary actions.</li>
                        <li class="list-group-item"><strong>Daily, Weekly, Monthly, and Yearly Analysis:</strong> Analyze your financial activities based on time periods. This allows you to observe changes in your income and expenses over time and identify trends.</li>
                        <li class="list-group-item"><strong>Detailed Reports and Charts:</strong> Visualize your financial situation in detail with various reports and charts. Reports include income-expense distributions, category-based spending, timelines, and more.</li>
                        <li class="list-group-item"><strong>Security and Privacy:</strong> The security of your personal finance information is our priority. Our platform is protected with security measures and uses the latest technologies to ensure the privacy of your sensitive data.</li>
                    </ul>

                    <p class="mt-4">Our website, "Personal Finance Manager," provides everything you need to achieve your financial goals. Increase your financial awareness, optimize your budget, and move towards the future with more confidence. Sign up today and gain financial freedom!</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
