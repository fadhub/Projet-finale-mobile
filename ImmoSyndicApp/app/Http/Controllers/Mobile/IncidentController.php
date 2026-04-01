<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        // URL de ton projet Web
        $apiUrl = env('API_BASE_URL') . '/incidents';

        // Appel de l'API avec timeout
        $response = Http::timeout(5)->get($apiUrl);

        if ($response->successful()) {
            $incidents = $response->json()['data'];
        } else {
            $incidents = [];
        }

        return view('mobile.incidents.index', compact('incidents'));
    }

    public function show($id)
    {
        $apiUrl = env('API_BASE_URL') . '/incidents/' . $id;
        $response = Http::timeout(5)->get($apiUrl);

        if (!$response->successful()) {
            return redirect()->route('incidents.index')->with('error', 'Incident introuvable');
        }

        $incident = $response->json()['data'];
        return view('mobile.incidents.show', compact('incident'));
    }

    public function create()
    {
        return view('mobile.incidents.create');
    }

    public function store(Request $request)
    {
        $apiUrl = env('API_BASE_URL') . '/incidents';
        
        // Simulating the user_id and immeuble_id for now as we don't have authentication on mobile yet
        // In a real app, these would come from the session or auth token
        $data = $request->all();
        $data['user_id'] = 1; 
        $data['immeuble_id'] = 1;

        $response = Http::timeout(5)->post($apiUrl, $data);

        if ($response->successful()) {
            return redirect()->route('incidents.index')->with('success', 'Incident signalé avec succès');
        }

        return back()->withErrors(['message' => 'Erreur lors du signalement'])->withInput();
    }
}
