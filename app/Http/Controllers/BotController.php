<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    private $instance_id = 'TU_INSTA68391 ';
    private $token = 'TU_TXDxS1xAoikB9TnEzpvSg036n9mN7CjvqgwDQLdjDa7294d49OKEN';

    public function enviarMensaje(Request $request)
    {
        $telefono = $request->input('telefono'); // ejemplo: '54911XXXXXXX'
        $mensaje = $request->input('mensaje');

        $url = "https://api.waapi.app/instance/{$this->instance_id}/sendText";

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->token}",
            'Content-Type' => 'application/json'
        ])->post($url, [
            "to" => $telefono,
            "message" => $mensaje
        ]);

        if ($response->successful()) {
            return response()->json(['status' => 'Mensaje enviado']);
        } else {
            return response()->json(['error' => $response->json()], 400);
        }
    }
}
