<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index'])->name('index');
Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact/create', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::delete('/contact/delete', [ContactController::class, 'delete'])->name('contact.delete');