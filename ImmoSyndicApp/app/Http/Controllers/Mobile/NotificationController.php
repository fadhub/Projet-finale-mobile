<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class NotificationController extends Controller
{
    public function index()
    {
        $userId = 4; // Hardcoded for now
        $apiUrl = env('API_BASE_URL', 'http://10.0.2.2:8000/api') . "/notifications/{$userId}";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $notifications = $response->json()['data'];
        } else {
            $notifications = [];
        }

        return view('mobile.notifications.index', compact('notifications'));
    }
}
