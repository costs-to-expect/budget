<?php

use App\Http\Controllers\Account;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\BudgetAccount;
use App\Http\Controllers\BudgetItem;
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

        // Budget account management
        Route::get(
            '/budget/account',
            [BudgetAccount::class, 'create']
        )->name('budget.account.create');

        Route::post(
            '/budget/account',
            [BudgetAccount::class, 'create']
        )->name('budget.account.create.process');

        // Budget item management
        Route::get(
            '/budget/item/{item_id}/confirm-delete',
            [BudgetItem::class, 'confirmDelete']
        )->name('budget.item.confirm-delete');

        Route::get(
            '/budget/item/{item_id}/confirm-disable',
            [BudgetItem::class, 'confirmDisable']
        )->name('budget.item.confirm-disable');

        Route::get(
            '/budget/item',
            [BudgetItem::class, 'create']
        )->name('budget.item.create');

        Route::get(
            '/budget/item/{item_id}',
            [BudgetItem::class, 'index']
        )->name('budget.item.view');

        Route::get(
            '/budget/item/{item_id}/update',
            [BudgetItem::class, 'update']
        )->name('budget.item.update');

        // Account management
        Route::get(
            '/account',
            [Account::class, 'index']
        )->name('account.index');
    }
);
