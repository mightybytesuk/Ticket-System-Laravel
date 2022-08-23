<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ticket Routes
Route::get('/tickets', [TicketController::class, 'tickets'])->name('tickets');

//Create Ticket Routes
Route::get('/create-ticket', [TicketController::class, 'createTicket'])->name('create-ticket');
Route::post('/create-ticket', [TicketController::class, 'storeTicket'])->name('store');