<?php

use App\Http\Controllers\Bot_controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\AuthController;



Route::get('/bot', [Bot_controller::class, 'handle'])->name('lead.bot');
Route::get('/table', [LeadController::class, 'index'])->name('lead.index');
Route::get('/report/{id}', [LeadController::class, 'report'])->name('lead.report');
Route::post('/report-submit', [Bot_controller::class, 'Report'])->name('report.submit');


