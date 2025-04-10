<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;




Route::get('/qr-code', [QrCodeController::class, 'showQRCode']);
Route::post('/generate-qr-code', [QrCodeController::class, 'generateQRCode'])->name('generate.qrcode');
