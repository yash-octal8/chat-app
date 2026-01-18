<?php

use Illuminate\Support\Facades\Route;
use  \Illuminate\Support\Facades\Artisan;

Route::get('/all-migrate/{path}', function ($path) {
    Artisan::call('migrate', [
        '--path' => $path,
        '--force' => true
    ]);
});

Route::get('/all-rollback', function () {
    Artisan::call('migrate:rollback', ['--force' => true]);
});

Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh', ['--force' => true]);
});

Route::get('/db-seed', function () {
    Artisan::call('db:seed', ['--force' => true]);
});

Route::get('/db-seed/{class}', function ($class) {
    Artisan::call('db:seed', [
        '--class' => $class,
        '--force' => true
    ]);
});

Route::get('/optimize:clear', function () {
    Artisan::call('optimize:clear');
});



Route::get('/', function () {
    return view('app');
});

Route::view('/chat/{any?}', 'app')->where('any', '.*');
Route::view('/{any}', 'app')->where('any', '.*');
Route::get('/all-migrate', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
});
