<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return 'Main Page';
});

Route::get('/hello', function () {
  return 'Hello';
})->name('hello');

Route::get('/greet/{name}', function ($name) {
  return "Hello, {$name}!";
});

Route::get('/hallo', function () {
  return redirect('/hello')->route('hello');
});

Route::fallback(function () {
  return 'Still got somewhere!';
});


//GET
//POST
//PUT
//DELETE
