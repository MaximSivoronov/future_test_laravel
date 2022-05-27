<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1/notebook')->group(function () {
    Route::get('/', [\App\Http\Controllers\API\V1\NotebookController::class, 'getNotebooks']);
    Route::post('/', [\App\Http\Controllers\API\V1\NotebookController::class, 'storeNotebook']);
    Route::get('/{notebook}', [\App\Http\Controllers\API\V1\NotebookController::class, 'getNotebook']);
    Route::patch('/{notebook}', [\App\Http\Controllers\API\V1\NotebookController::class, 'updateNotebook']);
    Route::delete('/{notebook}', [\App\Http\Controllers\API\V1\NotebookController::class, 'deleteNotebook']);
});
