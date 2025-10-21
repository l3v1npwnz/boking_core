<?php

use App\Http\Controllers\Api\v1\Guide\GuideController;
use App\Http\Controllers\Api\v1\HunterBooking\HunterBookingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], static function () {
    Route::get('guides', [GuideController::class, 'index'])->name('guides.index');
    Route::post('bookings', [HunterBookingController::class, 'bookings'])->name('bookings.booking');
});
