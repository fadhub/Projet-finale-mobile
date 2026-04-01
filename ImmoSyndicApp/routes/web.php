<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Mobile\HomeController;
use App\Http\Controllers\Mobile\IncidentController;
use App\Http\Controllers\Mobile\ChargeController;
use App\Http\Controllers\Mobile\NotificationController;
use App\Http\Controllers\Mobile\ArchiveController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/incidents', [IncidentController::class, 'index'])->name('incidents.index');
Route::get('/incidents/create', [IncidentController::class, 'create'])->name('incidents.create');
Route::post('/incidents', [IncidentController::class, 'store'])->name('incidents.store');
Route::get('/incidents/{id}', [IncidentController::class, 'show'])->name('incidents.show');
Route::get('/charges', [ChargeController::class, 'index'])->name('charges.index');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');

