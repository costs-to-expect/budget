<?php

use App\Http\Controllers\Account;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [Index::class, 'landing']
)->name('landing');


Route::get(
    '/sign-in',
    [Authentication::class, 'signIn']
)->name('sign-in.view');

Route::post(
    '/sign-in',
    [Authentication::class, 'signInProcess']
)->name('sign-in.process');


Route::get(
    '/register',
    [Authentication::class, 'register']
)->name('register.view');

Route::post(
    '/register',
    [Authentication::class, 'registerProcess']
)->name('register.process');


Route::get(
    '/create-password',
    [Authentication::class, 'createPassword']
)->name('create-password.view');

Route::post(
    '/create-password',
    [Authentication::class, 'createPasswordProcess']
)->name('create-password.process');

Route::get(
    '/registration-complete',
    [Authentication::class, 'registrationComplete']
)->name('registration-complete');


Route::get(
    '/sign-out',
    [Authentication::class, 'signOut']
)->name('sign-out');


Route::group(
    [
        'middleware' => [
            'auth'
        ]
    ],
    static function() {

        Route::get(
            '/home',
            [Index::class, 'home']
        )->name('home');

        // Account management
        Route::get(
            '/account',
            [Account::class, 'index']
        )->name('account.index');
    }
);
