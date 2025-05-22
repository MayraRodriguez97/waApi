<?php

use App\Services\WaapiService;

Route::get('/enviar-mensaje', function (WaapiService $waapi) {
    $telefono = '50364436190'; // Tu número real en formato internacional
    $mensaje = 'Hola, soy Laravel enviando por WAAPI!';
    $respuesta = $waapi->sendMessage($telefono, $mensaje);

    return $respuesta;
});
