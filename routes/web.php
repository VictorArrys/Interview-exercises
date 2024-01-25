<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductControllerClient;
use App\Http\Controllers\SaleController;

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
    return view('products_view');
});

Route::get('/docs', function () {
    return view('welcome');
});

Route::get('/Home', function () {
    return view('products_view');
});

Route::get('/Example', function () {
    return view('example');
});

Route::get('/Sales',  [SaleController::class,'show'])->name('sales');

Route::get('/ProductsClient',  [ProductControllerClient::class,'show'])->name('products_client');

//Client routes controller
Route::get('/ClientsAdmin',  [ClientController::class,'showClients'])->name('clients_admin');

Route::post('/ClientsAdmin', [ClientController::class,'saveClient'])->name('post_client');

Route::get('/ClientsAdmin/Delete/{id}', [ClientController::class, 'deleteClient'])->name('delete_client');


//Product routes controller

Route::get('/ProductAdmin', [ProductController::class,'showProducts'])->name('products_admin');

Route::post('/ProductAdmin', [ProductController::class,'saveProducts'])->name('post_product');

Route::get('/ProductAdmin/Delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete_product');

Route::get('/ProductsClient',  [ProductControllerClient::class,'show'])->name('products_client');

Route::post('/ProductsClient',  [SaleController::class,'saveSale'])->name('post_sale_client');
