<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeCtlr;

Route::get('/123', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('deniel_blog');
// });admin_show
Route::get('/admin', [homeCtlr::class, 'admin_show'])->name('admin_show');

Route::get('/admin/8756', [homeCtlr::class, 'admin_pass'])->name('admin_pass');
Route::post('/admin/5151', [homeCtlr::class, 'admin_store'])->name('admin_store');
Route::post('/admin/8411', [homeCtlr::class, 'admin_delete'])->name('admin_delete');
Route::post('/admin/7754', [homeCtlr::class, 'create_article'])->name('create_article');
Route::post('/admin/5546', [homeCtlr::class, 'admin_album_store'])->name('admin_album_store');
Route::post('/admin/5953', [homeCtlr::class, 'admin_photo_store'])->name('admin_photo_store');

Route::get('/travel/{travel}', [homeCtlr::class, 'travel_show'])->name('travel_show');
Route::get('/album/{album}', [homeCtlr::class, 'album_show'])->name('album_show');
Route::get('/chat/{chat}', [homeCtlr::class, 'chat_show'])->name('chat_show');
Route::get('/{page_chose?}', [homeCtlr::class, 'home_show'])->name('home_show');
