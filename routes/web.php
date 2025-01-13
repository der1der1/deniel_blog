<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeCtlr;

Route::get('/123', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('deniel_blog');
// });
Route::get('/travel/{travel}', [homeCtlr::class, 'travel_show'])->name('travel_show');
Route::get('/album/{album}', [homeCtlr::class, 'album_show'])->name('album_show');
Route::get('/chat/{chat}', [homeCtlr::class, 'chat_show'])->name('chat_show');
Route::get('/{page_chose?}', [homeCtlr::class, 'home_show'])->name('home_show');