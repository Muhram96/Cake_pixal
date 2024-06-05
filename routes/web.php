<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome2');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/tools', function () {
        return view('tools');
    })->name('/tools');
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'Dashboard'])->name('dashboard');
    Route::get('/about', [\App\Http\Controllers\HomeController::class, 'AboutUs'])->name('/about');
    Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'ContactUs'])->name('/contact');

    Route::get('/Eview', [\App\Http\Controllers\HomeController::class, 'EView'])->name('/Eview');
    Route::get('/Gview', [\App\Http\Controllers\HomeController::class, 'GView'])->name('/Gview');
    Route::get('/Cview', [\App\Http\Controllers\HomeController::class, 'CView'])->name('/Cview');
    Route::get('/Cpview', [\App\Http\Controllers\HomeController::class, 'CPView'])->name('/Cpview');
    Route::get('/IDview', [\App\Http\Controllers\HomeController::class, 'IDView'])->name('/IDview');
    Route::get('/CEview', [\App\Http\Controllers\HomeController::class, 'CEView'])->name('/CEview');

    Route::POST('/enhanceimage', [\App\Http\Controllers\TollsController::class, 'enhanceimage'])->name('/enhanceimage');
    Route::get('/unwantedobj', [\App\Http\Controllers\HomeController::class, 'UnwantedObj'])->name('/unwantedobj');
    Route::POST('/remove/obj', [\App\Http\Controllers\TollsController::class, 'ObjectRemover'])->name('/remove/obj');
    Route::POST('/backgroundchange', [\App\Http\Controllers\TollsController::class, 'GenerateBackGroundImage'])->name('/backgroundchange');
    Route::POST('/idphoto', [\App\Http\Controllers\TollsController::class, 'idphotoGenerator'])->name('/idphoto');
    Route::POST('/colorimage', [\App\Http\Controllers\TollsController::class, 'ColorImageGenerator'])->name('/colorimage');
    Route::POST('/compressedimage', [\App\Http\Controllers\TollsController::class, 'CompressedImageGenerator'])->name('/compressedimage');
    Route::POST('/crop_enhanceimage', [\App\Http\Controllers\TollsController::class, 'CropEnhancedImageGenerator'])->name('/crop_enhanceimage');
    Route::POST('/ocrimage', [\App\Http\Controllers\TollsController::class, 'OCRImageGenerator'])->name('/ocrimage');
    Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/success', [\App\Http\Controllers\PaymentController::class, 'paymentSuccess'])->name('payment.success');
});
Route::get('/view', [\App\Http\Controllers\HomeController::class, 'View'])->name('/view');
Route::POST('/removebackground', [\App\Http\Controllers\TollsController::class, 'RemoveBackground'])->name('/removebackground');
