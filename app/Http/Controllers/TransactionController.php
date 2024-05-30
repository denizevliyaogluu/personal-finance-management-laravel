<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Pets;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            $categories = Category::all();
            $userTransactions = Auth::user()->transactions()->with('category')->get();
            $currencies = Currency::all();
            return view('transactions.index', compact('userTransactions', 'categories', 'currencies'));
        } else {
            return redirect()->route('login');
        }
    }

    public function create()
    {
        $categories = Category::all();
        $currencies = Currency::all();
        return view('transactions.create', compact('categories', 'currencies'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:1000',
            'currency_id' => 'required|exists:currencies,id',
        ]);

        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->amount = $validatedData['amount'];
        $transaction->type = $validatedData['type'];
        $transaction->category_id = $validatedData['category_id'];
        $transaction->currency_id = $validatedData['currency_id'];
        $transaction->description = $validatedData['description'];
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }

    public function filter(Request $request)
    {
        $types = $request->input('type');
        $categories = $request->input('category');
        $currency_id = $request->input('currency_id');
        $query = Transaction::query();

        if ($types) {
            $query->whereIn('type', $types);
        }

        if ($categories) {
            $query->whereIn('category_id', $categories);
        }

        if ($currency_id) {
            $query->where('currency_id', $currency_id);
        }

        $userTransactions = $query->get();

        $categories = Category::all();
        $currencies = Currency::all();

        return view('transactions.index', compact('userTransactions', 'categories', 'currencies'));
    }
}
