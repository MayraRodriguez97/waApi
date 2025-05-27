<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;

// Ruta principal
Route::get('/', function () {
    return '¡Laravel está funcionando!';
});

// Ruta para probar si Laravel funciona
Route::get('/test', function () {
    return 'Laravel funciona correctamente';
});

// Ruta para probar si la ruta funciona
Route::get('/test-mensaje', function () {
    return 'La ruta funciona';
});

// Ruta POST para enviar mensaje desde BotController (no repetir)
Route::post('/enviar-mensaje', [BotController::class, 'enviarMensaje']);

// Ruta para manejar peticiones del bot (solo si tienes ese método)
Route::get('/bot', [BotController::class, 'handle']);
