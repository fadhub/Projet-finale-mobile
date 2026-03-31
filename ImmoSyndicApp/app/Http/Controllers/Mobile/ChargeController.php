<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ChargeController extends Controller
{
    public function index()
    {
        $userId = 4; // Hardcoded for now
        $apiUrl = env('API_BASE_URL', 'http://10.0.2.2:8000/api') . "/charges/{$userId}";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $charges = $response->json()['data'];
        } else {
            $charges = [];
        }

        return view('mobile.charges.index', compact('charges'));
    }
}
