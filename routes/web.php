<?php

use App\Http\Controllers\Index;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [Index::class, 'landing']
)->name('landing');
