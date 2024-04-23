<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/billeterie', [TicketsController::class,'index'])->name('tickets.index');
Route::get('/billeterie/create', [TicketsController::class,'create'])->name('tickets.create');
Route::post('/billeterie', [TicketsController::class,'store'])->name('tickets.store');
Route::get('/billeterie/{experience}', [TicketsController::class,'show'])->name('tickets.show');
Route::get('/billeterie', [TicketsController::class, 'index'])->name('ticket');
Route::get('billeterie/{experience}/edit', [TicketsController::class,'edit'])->name('tickets.edit');
Route::put('billeterie/{experience}', [TicketsController::class,'update'])->name('tickets.update');
Route::delete('billeterie/{experience}', [TicketsController::class,'destroy'])->name('tickets.destroy');
    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
