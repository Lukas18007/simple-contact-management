<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/create', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/edit/{id}', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/edit/{id}', [ContactController::class, 'update'])->name('contact.update');
Route::delete('/contact/delete/{id}', [ContactController::class, 'delete'])->name('contact.delete');
Route::get('/contact/details/{id}', [ContactController::class, 'show'])->name('contact.details');