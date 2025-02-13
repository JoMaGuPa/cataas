<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatImageController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/cats', [CatImageController::class, 'index'])->name('cats.index'); 
