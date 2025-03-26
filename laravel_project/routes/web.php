<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Mail;
use App\Mail\BidFromSite;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', [ClientController::class, 'index'])->name('index');
Route::post('/', [ClientController::class, 'store'])->name('post-form');

Route::get('/thanks', function () {
    return view('thanks');
})->name('thanks');

// Route::get('/test-telegram', function () {
//     Telegram::sendMessage([
//     'chat_id' => env('TELEGRAM_CHANNEL_ID'),
//     'parse_mode' => 'html',
//     'text' => 'Произошло тестовое событие'
//     ]);
//     return response()->json([
//     'status' => 'success'
//     ]);
// });
