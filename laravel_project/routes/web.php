<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Mail;
use App\Mail\BidFromSite;
// use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', [ClientController::class, 'index'])->name('index');
Route::post('/', [ClientController::class, 'store'])->name('post-form');

Route::get('/thanks', function () {
    $email = 'skygift.work@gmail.com';
    Mail::to($email)->send(new BidFromSite());

    return view('thanks');
})->name('thanks');