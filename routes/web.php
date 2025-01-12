<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeCtlr;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('deniel_blog');
// });

Route::get('/', [homeCtlr::class, 'home_show'])->name('home_show');
