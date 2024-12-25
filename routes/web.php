<?php

use App\Http\Controllers\BorrowController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Borrow;

use App\Http\Controllers\ReaderController;

Route::resource('readers', ReaderController::class);

Route::delete('/readers/{id}', [ReaderController::class, 'destroy'])->name('readers.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::resource('borrows',BorrowController::class);
Route::resource('books',BookController::class);
