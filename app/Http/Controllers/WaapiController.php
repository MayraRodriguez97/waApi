<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WaapiController extends Controller
{
    public function sendMessage()
    {
        // Obtener la URL base y el token desde config
        $baseUrl = config('app.waapi_url');  // 'https://waapi.app/api/v1'
        $token = config('app.waapi_token');  // tu token

        // Definir el endpoint específico que quieres usar
        $endpoint = '/send-message';

        // Concatenar asegurando solo una barra entre medio
        $url = rtrim($baseUrl, '/') . '/' . ltrim($endpoint, '/');

        // Ahora haces la petición HTTP usando $url y el token
        $response = Http::withToken($token)->post($url, [
            'phone' => '123456789',          // Reemplaza por el número real
            'message' => 'Hola desde Laravel', // El mensaje que quieres enviar
        ]);

        // Revisar la respuesta
        if ($response->successful()) {
            return response()->json(['status' => 'success', 'data' => $response->json()]);
        } else {
            return response()->json(['status' => 'error', 'message' => $response->body()], $response->status());
        }
    }
}
