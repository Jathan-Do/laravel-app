<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('layouts.app');
});
// Route::get('/app', function () {
//     return view('home');
// });
// Route::get('/homepage', function () {
//     return view('homepage');
// });
// Route::get('/list', function () {
//     return view('list');
// })->name('list');
// Route::get('/homepage', function () {
//     return view('homepage');
// })->name('homepage');

// Route cho trang chủ sử dụng HomeController
//                      Controller              function
Route::get('/homepage', [HomeController::class, 'index']);
Route::get('/filter', [HomeController::class, 'filter'])->name('filter');
Route::get('/detail', [HomeController::class, 'detail'])->name('detail');
Route::resource('service', ServiceController::class);
Route::get('/service', [ServiceController::class, 'detail'])->name('detail');
