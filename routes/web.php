<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PayerController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get(['/', ])

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/edit', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index'); 
    Route::get('/invoice/show', [InvoiceController::class, 'show'])->name('invoice.show');   
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::get('/invoice/edit', [InvoiceController::class, 'editall'])->name('invoice.edit');   

    Route::get('/payer', [PayerController::class, 'index'])->name('payer.index');
    Route::get('/payer/show', [PayerController::class, 'show'])->name('payer.show');
    Route::get('/payer/create', [PayerController::class, 'create'])->name('payer.create');
    Route::post('/payer/store', [PayerController::class, 'store'])->name('payer.store');
    Route::post('/payer/delete', [PayerController::class, 'destroy'])->name('payer.destroy');

});

Route::get('/locale/{locale}', function (Request $request, $locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

require __DIR__.'/auth.php';
