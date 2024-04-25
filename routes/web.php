<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('/index');
})->name('index');


Route::get('/dashboard', [TicketsController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/register/redirect', [RegisteredUserController::class, 'redirect'])->name('register.redirect');
Route::get('/billeterie', [TicketsController::class,'index'])->name('tickets.index');
Route::get('/billeterie/acheter', [TicketsController::class,'create'])->name('tickets.create');
Route::post('/billeterie', [TicketsController::class,'store'])->name('tickets.store');
Route::get('/billeterie/{ticket}', [TicketsController::class,'show'])->name('tickets.show');
Route::get('billeterie/{ticket}/edit', [TicketsController::class,'edit'])->name('tickets.edit');
Route::put('billeterie/{ticket}', [TicketsController::class,'update'])->name('tickets.update');
Route::get('qr-code/{token}', [TicketsController::class,'scanQrCode'])->name('tickets.scan');
Route::delete('billeterie/{ticket}', [TicketsController::class,'destroy'])->name('tickets.destroy');
Route::get('/tickets/{token}/pdf', [TicketsController::class, 'showPDF'])->name('tickets.pdf');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/dashboard', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

// Route::get('/register/{referral_link?}', [RegisteredUserController::class, 'store'])
//     ->middleware('guest')
//     ->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/animations', function () {
    return view('/animations/index');
})->name('animations.index');

Route::get('/programme', function () {
    return view('/programme/index');
})->name('programme.index');