<?php

use Illuminate\Support\Facades\Route;
use thiagoalessio\TesseractOCR\TesseractOCR;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('teste', function () {
    $teste = new TesseractOCR(storage_path('text.png'));

    $teste = $teste->run();

    dd(is_string($teste));

    return $teste;
});