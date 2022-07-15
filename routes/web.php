<?php

use App\Http\Controllers\HomeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/get-started', [HomeController::class, 'getStarted'])->name('get-started');


Route::get('select-vendor/{id}', [HomeController::class, 'getVendors'])->name('select-vendor');

Route::get('select-ticket-type/{id}', [HomeController::class, 'getTicketTypes'])->name('select-ticket-types');


Route::any('/create-ticket', [HomeController::class, 'createTicket'])->name('get-tickets');

Route::post('/ticket', [HomeController::class, 'payTicket'])->name('create-tickets');

Route::post('ticket/pay', [HomeController::class, 'paymentTicket'])->name('pay-tickets');

Route::match(['get', 'post'], '/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');


Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);


Route::get('/success', function () {
    return view('success');
})->name('success');

Route::get('/error', function () {
    return view('error');
})->name('error');
