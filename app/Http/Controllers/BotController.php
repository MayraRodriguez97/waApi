<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    private $token = '3FpCLjIUrWTE6WhE94ByGoQ8fLESkZVgYx6RiWYIc90145e3';

    public function enviarMensaje(Request $request)
    {
        // Validamos que el request tenga 'telefono' y 'mensaje'
        $request->validate([
            'telefono' => 'required|string',
            'mensaje' => 'required|string',
        ]);

        $telefono = $request->input('telefono'); // Ejemplo: 503XXXXXXXXX
        $mensaje = $request->input('mensaje');

        // Enviamos el mensaje usando la API de WAAPI
        $response = Http::withToken($this->token)
            ->post('https://waapi.app/api/v1/messages/send', [
                'recipient_type' => 'individual',
                'to' => $telefono,
                'type' => 'text',
                'text' => [
                    'body' => $mensaje
                ]
            ]);

        if ($response->successful()) {
            return response()->json(['status' => 'Mensaje enviado']);
        } else {
            return response()->json([
                'error' => 'No se pudo enviar el mensaje',
                'status' => $response->status(),
                'body' => $response->body()
            ], 400);
        }
    }
}
