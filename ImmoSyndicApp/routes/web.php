<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mobile\IncidentController;
use App\Http\Controllers\Mobile\ChargeController;
use App\Http\Controllers\Mobile\NotificationController;
use App\Http\Controllers\Mobile\ArchiveController;

Route::get('/', [IncidentController::class, 'index'])->name('incidents.index');
Route::get('/charges', [ChargeController::class, 'index'])->name('charges.index');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');

