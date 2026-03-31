<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ArchiveController extends Controller
{
    public function index()
    {
        $userId = 4; // Hardcoded for now
        $apiUrl = env('API_BASE_URL', 'http://10.0.2.2:8000/api') . "/documents/{$userId}";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $documents = $response->json()['data'];
        } else {
            $documents = [];
        }

        return view('mobile.archives.index', compact('documents'));
    }
}
