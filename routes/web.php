<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});


// Rotas do Vue
Route::get('/{any}', function () {
    return view('app'); // app.blade.php será carregado com o Vue
})->where('any', '.*');