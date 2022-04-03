<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReportController;

Route::get('', [ReportController::class, 'all'])
    ->name('app.report.get-all');

Route::get('{id}', [ReportController::class, 'find'])
    ->where('id', '[0-9]+')
    ->name('app.report.get-one');

Route::post('', [ReportController::class, 'create'])
    ->name('app.report.create');

Route::match(['put', 'patch'],'{id}', [ReportController::class, 'update'])
    ->where('id', '[0-9]+')
    ->name('app.report.update');

Route::delete('{id}', [ReportController::class, 'delete'])
    ->where('id', '[0-9]+')
    ->name('app.report.delete');
