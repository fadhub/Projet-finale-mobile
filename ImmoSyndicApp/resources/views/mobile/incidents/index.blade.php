@extends('layouts.app')

@section('content')
<div class="px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Mes Incidents</h2>
            <p class="text-slate-500 text-sm italic">Suivi de vos signalements en temps réel</p>
        </div>
        <a href="{{ route('incidents.create') }}" class="bg-primary text-white p-2.5 rounded-2xl shadow-lg shadow-primary/20 hover:scale-105 transition-transform flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </a>
    </div>
    
    <div class="space-y-4">
        @forelse($incidents as $incident)
            <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100/50 group active:scale-[0.98] transition-all">
                <div class="flex justify-between items-start mb-3">
                    <div class="w-10 h-10 rounded-2xl bg-orange-50 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <span @class([
                        'px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider',
                        'bg-blue-50 text-blue-600' => ($incident['statut'] ?? '') === 'Ouvert',
                        'bg-green-50 text-green-600' => ($incident['statut'] ?? '') === 'Résolu',
                        'bg-slate-50 text-slate-400' => ($incident['statut'] ?? '') !== 'Ouvert' && ($incident['statut'] ?? '') !== 'Résolu',
                    ])>
                        {{ $incident['statut'] ?? 'Inconnu' }}
                    </span>
                </div>
                
                <h3 class="font-bold text-slate-800 text-lg mb-1 leading-snug">
                    {{ $incident['titre'] ?? 'Signalement d\'incident' }}
                </h3>
                <p class="text-slate-500 text-sm line-clamp-2 mb-3">
                    {{ $incident['description'] ?? 'Aucune description fournie pour cet incident.' }}
                </p>
                
                <div class="pt-3 border-t border-slate-50 flex items-center justify-between">
                    <div class="flex items-center text-slate-400 text-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ $incident['localisation'] ?? 'Parties communes' }}
                    </div>
                    <a href="{{ route('incidents.show', $incident['id']) }}" class="text-primary text-xs font-bold uppercase tracking-widest flex items-center italic">
                        Détails
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-20 text-center px-10">
                <div class="w-16 h-16 bg-slate-100 rounded-3xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h4 class="font-bold text-slate-800 mb-1">Aucun incident</h4>
                <p class="text-slate-400 text-sm">Tout semble correct pour le moment. Vous pouvez signaler un problème en utilisant le bouton ci-dessus.</p>
            </div>
        @endforelse
    </div>
    
    <div class="h-20"></div> <!-- Spacer for fixed nav -->
</div>
@endsection
