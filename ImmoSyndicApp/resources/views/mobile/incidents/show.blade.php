@extends('layouts.app')

@section('content')
<div class="px-6 py-8 pb-20">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('incidents.index') }}" class="w-10 h-10 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h2 class="text-xl font-bold text-slate-800 tracking-tight">Détails de l'incident</h2>
    </div>

    <!-- Status Card -->
    <div @class([
        'p-5 rounded-3xl mb-8 flex items-center justify-between border shadow-sm transition-all',
        'bg-blue-50 border-blue-100 text-blue-700' => ($incident['statut'] ?? '') === 'Ouvert',
        'bg-green-50 border-green-100 text-green-700' => ($incident['statut'] ?? '') === 'Résolu',
        'bg-slate-50 border-slate-200 text-slate-600' => ($incident['statut'] ?? '') !== 'Ouvert' && ($incident['statut'] ?? '') !== 'Résolu',
    ])>
        <div class="flex items-center gap-3">
            <div @class([
                'w-10 h-10 rounded-2xl flex items-center justify-center',
                'bg-blue-100' => ($incident['statut'] ?? '') === 'Ouvert',
                'bg-green-100' => ($incident['statut'] ?? '') === 'Résolu',
                'bg-slate-200' => ($incident['statut'] ?? '') !== 'Ouvert' && ($incident['statut'] ?? '') !== 'Résolu',
            ])>
                <div @class([
                    'w-3 h-3 rounded-full',
                    'bg-blue-600' => ($incident['statut'] ?? '') === 'Ouvert',
                    'bg-green-600' => ($incident['statut'] ?? '') === 'Résolu',
                    'bg-slate-500' => ($incident['statut'] ?? '') !== 'Ouvert' && ($incident['statut'] ?? '') !== 'Résolu',
                ])></div>
            </div>
            <div>
                <p class="text-[10px] uppercase font-bold tracking-widest opacity-60 leading-none mb-1">Statut actuel</p>
                <p class="font-bold text-base leading-none">{{ $incident['statut'] ?? 'Inconnu' }}</p>
            </div>
        </div>
        <div class="bg-white/50 px-3 py-1.5 rounded-xl border border-white shadow-sm italic text-xs font-medium">
            Mise à jour {{ \Carbon\Carbon::parse($incident['updated_at'] ?? now())->diffForHumans() }}
        </div>
    </div>

    <!-- Main Content -->
    <div class="space-y-8">
        <div>
            <h1 class="text-2xl font-black text-slate-800 leading-tight mb-2">
                {{ $incident['titre'] ?? 'Signalement' }}
            </h1>
            <div class="flex items-center gap-4 text-slate-400 text-sm">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    {{ $incident['localisation'] ?? 'Parties communes' }}
                </div>
                <div class="w-1 h-1 bg-slate-200 rounded-full"></div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Priorité {{ $incident['priorite'] ?? 'Normale' }}
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-slate-100">
            <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-3 ml-1">Description</h4>
            <p class="text-slate-600 leading-relaxed text-[15px]">
                {{ $incident['description'] ?? 'Aucune description fournie.' }}
            </p>
        </div>

        @if(isset($incident['photo']))
        <div class="space-y-3">
            <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 ml-1">Photo jointe</h4>
            <div class="rounded-3xl overflow-hidden shadow-md border border-slate-100 bg-slate-50 aspect-video">
                <!-- Assuming the API provides a relative path we can use with asset() or equivalent -->
                <img src="{{ Str::startsWith($incident['photo'], 'http') ? $incident['photo'] : asset('storage/' . $incident['photo']) }}" 
                     class="w-full h-full object-cover" 
                     alt="Photo de l'incident"
                     onerror="this.parentNode.innerHTML = '<div class=\'flex items-center justify-center h-full text-slate-300\'><svg class=\'w-12 h-12\' fill=\'none\' viewbox=\'0 0 24 24\' stroke=\'currentColor\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\' /></div>';">
            </div>
        </div>
        @endif
    </div>

    <!-- Timeline / Progress (Simulation) -->
    <div class="mt-12">
        <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-6 ml-1">Suivi du dossier</h4>
        <div class="space-y-6 relative ml-4">
            <div class="absolute top-0 left-[7px] bottom-0 w-[2px] bg-slate-100"></div>
            
            <div class="relative pl-10">
                <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-blue-500 border-4 border-white shadow-sm z-10"></div>
                <p class="text-slate-800 font-bold text-sm leading-none mb-1">Signalement reçu</p>
                <p class="text-slate-400 text-xs italic">{{ \Carbon\Carbon::parse($incident['created_at'] ?? now())->format('d/m/Y à H:i') }}</p>
            </div>

            @if(($incident['statut'] ?? '') === 'Résolu')
            <div class="relative pl-10">
                <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-green-500 border-4 border-white shadow-sm z-10"></div>
                <p class="text-slate-800 font-bold text-sm leading-none mb-1">Incident résolu</p>
                <p class="text-slate-400 text-xs italic">{{ \Carbon\Carbon::parse($incident['updated_at'] ?? now())->format('d/m/Y à H:i') }}</p>
            </div>
            @else
            <div class="relative pl-10">
                <div class="absolute left-0 top-0 w-4 h-4 rounded-full bg-slate-200 border-4 border-white shadow-sm z-10"></div>
                <p class="text-slate-400 font-bold text-sm leading-none mb-1">Traitement en cours</p>
                <p class="text-slate-400 text-xs italic">En attente d'attribution...</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
