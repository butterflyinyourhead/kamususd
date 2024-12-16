<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DictionaryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/search/{name_dict}', [DictionaryController::class, 'show'])->name('dictionaries.search');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginPost'])->name('login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [DictionaryController::class, 'create'])->name('dictionaries.index');
    Route::post('/store', [DictionaryController::class, 'store'])->name('dictionaries.store');
    Route::get('/edit/{id}', [DictionaryController::class, 'edit'])->name('dictionaries.edit');
    Route::put('/update/{id}', [DictionaryController::class, 'update'])->name('dictionaries.update');
    Route::delete('/destroy/{id}', [DictionaryController::class, 'destroy'])->name('dictionaries.destroy');
    Route::delete('/logout', [UserController::class, 'logout'])->name('logout');
});
