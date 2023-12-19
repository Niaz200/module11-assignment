<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::get('/dashboard', [DashboardController::class, 'Index']);



 
Route::get('/admin/dashboard',[DashboardController::class,'Index'])->name('admindashboard');

//Product
Route::get('/admin/all-product',[ProductController::class,'Index'])->name('allproducts');
Route::get('/admin/add-product',[ProductController::class,'AddProduct'])->name('addproduct');
Route::post('/admin/store-product',[ProductController::class,'StoreProduct'])->name('storeproduct');
Route::get('/edit-product/{id}', [ProductController::class, 'EditProduct'])->name('editproduct');
Route::post('/update-product/{id}',[ProductController::class,'UpdateProduct']);
Route::get('/delete-product/{id}', [ProductController::class, 'DeleteProduct'])->name('deleteproduct');

//sales
Route::post('/admin/sale-product',[InvoiceController::class,'SaleProduct'])->name('saleproduct');
Route::get('/admin/all-sale',[InvoiceController::class,'Index'])->name('allsales');
Route::get('/delete-sale/{id}', [InvoiceController::class, 'DeleteSale'])->name('deletesale');


