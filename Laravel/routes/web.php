<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;


Route::get('/', [KelasController::class, 'index']);
Route::get('/detail/{id}', [KelasController::class, 'detail'])->name('detail');


Route::get('/{selected_semester}/{selected_limit}/{selected_page}/{isProdi}', [KelasController::class, 'get_matakuliah'])->name('lihat_semester');
