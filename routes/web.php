<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;

//Route mặc định
Route::get('/', function () {
    return view('home');
});
// Route cho trang chủ sử dụng HomeController
//                      Controller              function
Route::get('/homepage', [HomeController::class, 'index']);
Route::get('/homepage/filter', [HomeController::class, 'filter'])->name('homepage.filter');

// Route cho trang chủ sử dụng ServiceController
// Route::resource('service', ServiceController::class);
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');
Route::post('/service/delete{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
Route::get('/service/edit{id}', [ServiceController::class, 'edit'])->name('service.edit');
Route::post('/service/edit{id}', [ServiceController::class, 'update'])->name('service.update');
