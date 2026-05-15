<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('mail', [MailController::class, 'index'])->name('mail.index');
    Route::get('mail/create', [MailController::class, 'create'])->name('mail.create');
    Route::post('mail', [MailController::class, 'store'])->name('mail.store');
    Route::get('mail/subscribers/{subscriber}', [SubscriberController::class, 'index'])->name('mail.subscribers');
});


require __DIR__.'/auth.php';
