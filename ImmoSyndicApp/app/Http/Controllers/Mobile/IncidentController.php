<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class IncidentController extends Controller
{
    public function index()
    {
        // URL de ton projet Web (10.0.2.2 est l'alias de localhost pour l'émulateur Android)
        $apiUrl = env('API_BASE_URL') . '/incidents';

        // Appel de l'API
        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $incidents = $response->json()['data'];
        } else {
            $incidents = [];
        }

        return view('mobile.incidents.index', compact('incidents'));
    }
}
