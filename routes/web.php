<?php

use App\Events\NewMessage;
use Illuminate\Support\Facades\Route;


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

// Route::get('/broadcast', function () {
//     broadcast(new NewMessage());
// });

Route::get('/broadcast', function () {
    // return Hello::dispatch();
    Hello::dispatch();
    return 'sent';
});