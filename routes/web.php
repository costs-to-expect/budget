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

Route::view(
    '/workflow',
    'workflow'
)->name('workflow');

Route::view(
    '/getting-started',
    'getting-started'
)->name('getting-started');

Route::view(
    '/faqs',
    'faqs'
)->name('faqs');

Route::view(
    '/version-compare',
    'version-compare'
)->name('version-compare');

Route::view(
    '/privacy-policy',
    'privacy-policy'
)->name('privacy-policy');

Route::view(
    '/help/add-income',
    'add-income'
)->name('help.add-income');

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

        Route::get(
            '/demo',
            [Index::class, 'demo']
        )->name('demo');

        Route::post(
            '/demo',
            [Index::class, 'demoProcess']
        )->name('demo.process');

        Route::post(
            '/adopt-demo',
            [Index::class, 'adoptDemoProcess']
        )->name('demo.adopt.process');

        Route::get(
            '/is-demo-loaded',
            [Index::class, 'isDemoLoaded']
        )->name('demo.is-loaded');

        Route::get(
            '/start',
            [Index::class, 'start']
        )->name('start');

        Route::post(
            '/start',
            [Index::class, 'startProcess']
        )->name('start.process');


        // Budget account management
        Route::get(
            '/budget/account',
            [BudgetAccount::class, 'create']
        )->name('budget.account.create');

        Route::post(
            '/budget/account',
            [BudgetAccount::class, 'createProcess']
        )->name('budget.account.create.process');

        Route::get(
            '/budget/account/{account_id}/edit',
            [BudgetAccount::class, 'update']
        )->name('budget.account.update');

        Route::post(
            '/budget/account/{account_id}/edit',
            [BudgetAccount::class, 'updateProcess']
        )->name('budget.account.update.process');


        // Budget item management
        Route::post(
            '/budget/item/{item_id}/adjust/{item_year}/{item_month}',
            [BudgetItem::class, 'adjustProcess']
        )->name('budget.item.adjust.process');

        Route::post(
            '/budget/item/{item_id}/reset/{item_year}/{item_month}',
            [BudgetItem::class, 'resetProcess']
        )->name('budget.item.reset.process');

        Route::post(
            '/budget/item/{item_id}/restore',
            [BudgetItem::class, 'restoreProcess']
        )->name('budget.item.restore.process');

        Route::get(
            '/budget/item/{item_id}/confirm-delete',
            [BudgetItem::class, 'confirmDelete']
        )->name('budget.item.confirm-delete');

        Route::post(
            '/budget/item/{item_id}/confirm-delete',
            [BudgetItem::class, 'confirmDeleteProcess']
        )->name('budget.item.confirm-delete.process');

        Route::get(
            '/budget/item/{item_id}/confirm-disable',
            [BudgetItem::class, 'confirmDisable']
        )->name('budget.item.confirm-disable');

        Route::post(
            '/budget/item/{item_id}/confirm-disable',
            [BudgetItem::class, 'confirmDisableProcess']
        )->name('budget.item.confirm-disable.process');

        Route::get(
            '/budget/item/{item_id}/confirm-enable',
            [BudgetItem::class, 'confirmEnable']
        )->name('budget.item.confirm-enable');

        Route::post(
            '/budget/item/{item_id}/confirm-enable',
            [BudgetItem::class, 'confirmEnableProcess']
        )->name('budget.item.confirm-enable.process');

        Route::post(
            '/budget/item/{item_id}/set-as-paid',
            [BudgetItem::class, 'setAsPaidProcess']
        )->name('budget.item.set-as-paid.process');

        Route::post(
            '/budget/item/{item_id}/set-as-not-paid',
            [BudgetItem::class, 'setAsNotPaidProcess']
        )->name('budget.item.set-as-not-paid.process');

        Route::get(
            '/budget/item/create-expense',
            [BudgetItem::class, 'createExpense']
        )->name('budget.item.create-expense');

        Route::post(
            '/budget/item/create-expense',
            [BudgetItem::class, 'createExpenseProcess']
        )->name('budget.item.create-expense.process');

        Route::get(
            '/budget/item/create-income',
            [BudgetItem::class, 'createIncome']
        )->name('budget.item.create-income');

        Route::post(
            '/budget/item/create-income',
            [BudgetItem::class, 'createIncomeProcess']
        )->name('budget.item.create-income.process');

        Route::get(
            '/budget/item/create-saving',
            [BudgetItem::class, 'createSaving']
        )->name('budget.item.create-saving');

        Route::post(
            '/budget/item/create-saving',
            [BudgetItem::class, 'createSavingProcess']
        )->name('budget.item.create-saving.process');

        Route::get(
            '/budget/item/{item_id}',
            [BudgetItem::class, 'index']
        )->name('budget.item.view');

        Route::get(
            '/budget/item/{item_id}/edit',
            [BudgetItem::class, 'update']
        )->name('budget.item.update');

        Route::post(
            '/budget/item/{item_id}/edit',
            [BudgetItem::class, 'updateProcess']
        )->name('budget.item.update.process');

        Route::get(
            '/budget/items',
            [BudgetItem::class, 'list']
        )->name('budget.item.list');


        // Account management
        Route::get(
            '/account',
            [Account::class, 'index']
        )->name('account.index');

        Route::get(
            '/account/reset',
            [Account::class, 'reset']
        )->name('account.reset');

        Route::post(
            '/account/reset',
            [Account::class, 'resetProcess']
        )->name('account.reset.process');

        Route::get(
            '/account/delete-budget-account',
            [Account::class, 'deleteBudgetAccount']
        )->name('account.delete-budget-account');

        Route::post(
            '/account/delete-budget-account',
            [Account::class, 'deleteBudgetAccountProcess']
        )->name('account.delete-budget-account.process');

        Route::get(
            '/account/delete-account',
            [Account::class, 'deleteAccount']
        )->name('account.delete-account');

        Route::post(
            '/account/delete-account',
            [Account::class, 'deleteAccountProcess']
        )->name('account.delete-account.process');

        Route::get(
            '/account/change-password',
            [Account::class, 'changePassword']
        )->name('account.change-password');

        Route::post(
            '/account/change-password',
            [Account::class, 'changePasswordProcess']
        )->name('account.change-password.process');

        Route::get(
            '/account/update-profile',
            [Account::class, 'updateProfile']
        )->name('account.update-profile');

        Route::post(
            '/account/update-profile',
            [Account::class, 'updateProfileProcess']
        )->name('account.update-profile.process');
    }
);
