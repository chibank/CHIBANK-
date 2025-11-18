<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;

/*
|--------------------------------------------------------------------------
| Enterprise Health Check Routes
|--------------------------------------------------------------------------
|
| These routes provide comprehensive health check endpoints for monitoring
| and alerting systems. They are used by load balancers, monitoring tools,
| and orchestration platforms to determine application health.
|
*/

Route::prefix('health')->group(function () {
    
    // Basic health check - simple 200 OK response
    Route::get('/', [HealthCheckController::class, 'basic'])
        ->name('health.basic');
    
    // Liveness probe - determines if application is alive
    Route::get('/live', [HealthCheckController::class, 'liveness'])
        ->name('health.liveness');
    
    // Readiness probe - determines if application can serve traffic
    Route::get('/ready', [HealthCheckController::class, 'readiness'])
        ->name('health.readiness');
    
    // Detailed health check - checks all critical services
    Route::get('/detailed', [HealthCheckController::class, 'detailed'])
        ->name('health.detailed');
    
    // Application metrics endpoint
    Route::get('/metrics', [HealthCheckController::class, 'metrics'])
        ->name('health.metrics');
});
