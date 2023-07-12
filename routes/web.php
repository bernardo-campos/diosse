<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/home', function() {
    return view('home');
});

Route::group([
        'as'            => 'users.',
        'prefix'        => 'personal',
        'controller'    => UserController::class,
    ], function () {
        Route::get('/','index')->name('index');
        Route::get('/crear','create')->name('create');
        Route::post('/','store')->name('store');
        Route::get('/{user}/editar','edit')->name('edit');
        Route::put('/{user}','update')->name('update');
        // Route::delete('/{user}','destroy')->name('destroy');
});