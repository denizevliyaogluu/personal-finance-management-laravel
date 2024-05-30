<?php

use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PetsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/learn-more', 'HomepageController@learnMore')->name('learnMore');

Route::get('/transactions', 'TransactionController@index')->name('transactions.index');
Route::get('/transactions/create', 'TransactionController@create')->name('transactions.create');
Route::post('/transactions', 'TransactionController@store')->name('transactions.store');
Route::delete('/transactions/{transaction}', 'TransactionController@destroy')->name('transactions.destroy');
Route::get('/transactions/filter', 'TransactionController@filter')->name('transactions.filter');

Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::post('/categories', 'CategoryController@store')->name('categories.store');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
Route::put('/categories/{category}','CategoryController@update')->name('categories.update');
Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

Route::get('/reports', 'ReportController@index')->name('reports.index');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::put('/update','UserController@update')->name('update');
});