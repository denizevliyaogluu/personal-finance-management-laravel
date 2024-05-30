<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'category_id',
        'currency_id',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeInDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    public static function getDailyExpenses($userId)
    {
        $today = Carbon::today();
        return self::ofUser($userId)
            ->inDateRange($today, $today->copy()->endOfDay())
            ->where('type', 'expense')
            ->sum('amount');
    }

    public static function getWeeklyExpenses($userId)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        return self::ofUser($userId)
            ->inDateRange($startOfWeek, $endOfWeek)
            ->where('type', 'expense')
            ->sum('amount');
    }

    public static function getMonthlyExpenses($userId)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        return self::ofUser($userId)
            ->inDateRange($startOfMonth, $endOfMonth)
            ->where('type', 'expense')
            ->sum('amount');
    }

    public static function getYearlyExpenses($userId)
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        return self::ofUser($userId)
            ->inDateRange($startOfYear, $endOfYear)
            ->where('type', 'expense')
            ->sum('amount');
    }

    public static function getDailyIncomes($userId)
    {
        return DB::table('transactions')
            ->where('user_id', $userId)
            ->where('type', 'income')
            ->whereDate('created_at', today())
            ->sum('amount');
    }

    public static function getWeeklyIncomes($userId)
    {
        return DB::table('transactions')
            ->where('user_id', $userId)
            ->where('type', 'income')
            ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->sum('amount');
    }

    public static function getMonthlyIncomes($userId)
    {
        return DB::table('transactions')
            ->where('user_id', $userId)
            ->where('type', 'income')
            ->whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)
            ->sum('amount');
    }

    public static function getYearlyIncomes($userId)
    {
        return DB::table('transactions')
            ->where('user_id', $userId)
            ->where('type', 'income')
            ->whereYear('created_at', now()->year)
            ->sum('amount');
    }
    public static function getDailyExpenseTransactions($userId)
    {
        return self::ofUser($userId)
            ->where('type', 'expense')
            ->whereDate('created_at', today())
            ->get();
    }

    public static function getDailyIncomeTransactions($userId)
    {
        return self::ofUser($userId)
            ->where('type', 'income')
            ->whereDate('created_at', today())
            ->get();
    }
    public static function getWeeklyExpenseTransactions($userId)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        return self::ofUser($userId)
            ->where('type', 'expense')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();
    }

    public static function getWeeklyIncomeTransactions($userId)
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        return self::ofUser($userId)
            ->where('type', 'income')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->get();
    }
    public static function getMonthlyExpenseTransactions($userId)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        return self::ofUser($userId)
            ->where('type', 'expense')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();
    }

    public static function getMonthlyIncomeTransactions($userId)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        return self::ofUser($userId)
            ->where('type', 'income')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->get();
    }
    public static function getYearlyExpenseTransactions($userId)
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        return self::ofUser($userId)
            ->where('type', 'expense')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->get();
    }

    public static function getYearlyIncomeTransactions($userId)
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        return self::ofUser($userId)
            ->where('type', 'income')
            ->whereBetween('created_at', [$startOfYear, $endOfYear])
            ->get();
    }
    public static function getCustomExpenses($userId, $customDate)
{
    return Transaction::where('user_id', $userId)
        ->whereDate('created_at', $customDate)
        ->where('amount', '<', 0) // Giderleri almak için
        ->sum('amount');
}
public static function getCustomIncomes($userId, $customDate)
{
    return Transaction::where('user_id', $userId)
        ->whereDate('created_at', $customDate)
        ->where('amount', '>', 0) // Gelirleri almak için
        ->sum('amount');
}
public static function getCustomExpenseTransactions($userId, $customDate)
{
    return Transaction::where('user_id', $userId)
        ->where('type', 'expense')
        ->whereDate('created_at', $customDate)
        ->get();
}

public static function getCustomIncomeTransactions($userId, $customDate)
{
    return Transaction::where('user_id', $userId)
        ->where('type', 'income')
        ->whereDate('created_at', $customDate)
        ->get();
}
}
