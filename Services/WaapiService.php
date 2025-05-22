<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WaapiService
{
    protected $baseUrl = 'https://waapi.app/api/v1/instances/';
    protected $instanceId;
    protected $token;

    public function __construct()
    {
        $this->instanceId = config('app.waapi_instance_id');
        $this->token = config('app.waapi_token');
    }

    public function sendMessage($phone, $message)
    {
        $url = $this->baseUrl . $this->instanceId . '/client/message';
        $response = Http::withToken($this->token)->post($url, [
            'phone' => $phone,
            'message' => $message,
        ]);

        return $response->json();
    }
}
