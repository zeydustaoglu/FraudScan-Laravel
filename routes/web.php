<?php

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//index
Route::get('/', [Controller::class, 'index']);

//all customer
Route::get('/customers', [CustomerController::class, 'customers']);
//scanned customers
Route::get('/scan-customers', [ScanController::class, 'scanCustomers']);
Route::get('/scan-customers/{id}', [ScanController::class, 'scanDetail']);
