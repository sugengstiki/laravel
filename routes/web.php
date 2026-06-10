<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

Route::livewire('/feedback', 'feedback.tampil')->name('feedback');