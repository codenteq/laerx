<?php

namespace App\Services\ThirdPartyService;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendPortalService
{
    public function subscribeUserStore($data)
    {
        $response = Http::withToken(env('SEND_PORTAL_API_KEY'))
            ->acceptJson()
            ->contentType('application/json')
            ->post(env('SEND_PORTAL_API_URL') . '/subscribers' , [
                'first_name' => $data->name,
                'last_name' => $data->surname,
                'email' => $data->email,
                'tags' => [1],
            ]);
        if (!$response->successful())
        {
            Log::info([
                'error' => $response,
                'email' => $data->email
            ]);
        }
    }
}
