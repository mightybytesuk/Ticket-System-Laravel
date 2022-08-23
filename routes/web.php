<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');

//Ticket Routes
Route::get('/tickets', [TicketController::class, 'tickets'])->middleware('auth')->name('tickets');
Route::get('/ticket/{id}', [TicketController::class, 'ticket'])->middleware('auth', 'message')->name('view-ticket');
Route::post('/ticket/reply', [TicketController::class, 'reply'])->middleware('auth','message')->name('reply');

//Create Ticket Routes
Route::get('/create-ticket', [TicketController::class, 'createTicket'])->middleware('auth')->name('create-ticket');
Route::post('/create-ticket', [TicketController::class, 'storeTicket'])->middleware('auth')->name('store');


//Admin Routes

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth', 'admin')->name('admin');
Route::get('/admin/tickets', [AdminController::class, 'tickets'])->middleware('auth', 'admin')->name('admin-tickets');
Route::get('/admin/my-tickets', [AdminController::class, 'claimed'])->middleware('auth', 'admin')->name('claimedtickets');
Route::get('/admin/ticket/{id}', [AdminController::class, 'ticket'])->middleware('auth','admin')->name('ticket');

Route::post('/admin/claim', [AdminController::class, 'claim'])->middleware('auth','admin')->name('claim');
Route::post('/admin/reply', [AdminController::class, 'reply'])->middleware('auth','admin','message')->name('admin-reply');
Route::post('/admin/edit/priority', [AdminController::class, 'editpriority'])->middleware('auth','admin','message')->name('edit-priority');
Route::post('/admin/edit/status', [AdminController::class, 'editstatus'])->middleware('auth','admin','message')->name('edit-status');

Route::get('/signout', [HomeController::class, 'signout'])->name('signout');