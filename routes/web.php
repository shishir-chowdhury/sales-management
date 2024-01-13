<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\supplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Client route: Show add client form
Route::view('newclientform', '/addclient')->middleware(['auth', 'verified']);

// Supplier route: Show add supplier form
Route::view('newsupplierform', '/addsupplier')->middleware(['auth', 'verified']);

// Item route: Show add item form
Route::view('newitemform', '/additem')->middleware(['auth', 'verified']);

// Supplier route controller
Route::controller(supplierController::class)->group(function (){

    // Add data in DB
    Route::post('addnewsupplier', 'addSupplier')->middleware(['auth', 'verified'])->name('add.supplier');

    //  View all supplier in DB
    Route::get('viewsupplier','supplierInfo')->middleware(['auth', 'verified'])->name('view.supplier');

    // View single supplier in DB
    Route::get('singlesupplier/{id}','singleSupplier')->middleware(['auth', 'verified'])->name('single.supplier');

    // Show existing updatable supplier in DB
    Route::get('updatesupplierinfo/{id}', 'updateSupplierInfo')->middleware(['auth', 'verified'])->name('update.supplier.info');

    // Update supplier in DB
    Route::post('updatesupplier/{id}', 'updateSupplier')->middleware(['auth', 'verified'])->name('update.supplier');

    // Delete supplier data from DB
    Route::get('deletesupplier/{id}','deleteSuplier')->middleware(['auth', 'verified'])->name('delete.supplier');
});

// Client route controller
Route::controller(clientController::class)->group(function () {
    // Add client in DB
    Route::post('addnewclient', 'addClient')->middleware(['auth', 'verified'])->name('add.client');

    //  View all client in DB
    Route::get('viewclient','clientInfo')->middleware(['auth', 'verified'])->name('view.client');

    // Update client in DB
    Route::post('updateclient/{id}', 'updateClient')->middleware(['auth', 'verified'])->name('update.client');

    // Show existing updatable client in DB
    Route::get('updateclientinfo/{id}', 'updateClientInfo')->middleware(['auth', 'verified'])->name('update.client.info');

    // View single client in DB
    Route::get('singleclient/{id}','singleClient')->middleware(['auth', 'verified'])->name('single.client');

    // Delete client data from DB
    Route::get('deleteclient/{id}','deleteClient')->middleware(['auth', 'verified'])->name('delete.client');
});

// Item route controller
Route::controller(itemController::class)->middleware(['auth', 'verified'])->group(function () {

    // Add item in DB
    Route::post('addnewitem', 'addItem')->middleware(['auth', 'verified'])->name('add.item');

    //  View all item in DB
    Route::get('viewitem','itemInfo')->middleware(['auth', 'verified'])->name('view.item');

    // Show existing updatable supplier in DB
    Route::get('updateiteminfo/{id}', 'updateItemInfo')->middleware(['auth', 'verified'])->name('update.item.info');

    // Update item in DB
    Route::post('updateitem/{id}', 'updateItem')->middleware(['auth', 'verified'])->name('update.item');

    // Delete item data from DB
    Route::get('deleteitem/{id}','deleteItem')->middleware(['auth', 'verified'])->name('delete.item');
});

// Invoice route: Show add item form


Route::controller(invoiceController::class)->middleware(['auth', 'verified'])->group(function () {

   Route::get('addinvoice', 'itemListInvoice')->name('add.invoice');
   Route::post('/getclientid', 'getClientInputId');
   Route::post('/getitemid', 'getItemInputId');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
