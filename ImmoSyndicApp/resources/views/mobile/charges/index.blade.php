@extends('layouts.app')

@section('content')
<div class="px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Mes Charges</h2>
            <p class="text-slate-500 text-sm italic">Suivi de vos paiements et factures</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>
    
    <div class="space-y-4">
        @forelse($charges as $charge)
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100/50 active:scale-[0.98] transition-all">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Echéance: {{ \Carbon\Carbon::parse($charge['date_echeance'])->format('d M Y') }}</span>
                        <h3 class="font-bold text-slate-800 text-lg leading-tight">{{ $charge['titre'] ?? 'Charge de copropriété' }}</h3>
                    </div>
                    <span @class([
                        'px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider',
                        'bg-red-50 text-red-600' => ($charge['statut'] ?? '') === 'en_attente',
                        'bg-green-50 text-green-600' => ($charge['statut'] ?? '') === 'payé',
                        'bg-slate-50 text-slate-400' => !in_array(($charge['statut'] ?? ''), ['en_attente', 'payé']),
                    ])>
                        {{ $charge['statut'] === 'en_attente' ? 'En attente' : ucfirst($charge['statut'] ?? 'Inconnu') }}
                    </span>
                </div>
                
                <div class="flex items-end justify-between">
                    <div>
                        <p class="text-3xl font-black text-slate-800">{{ number_format($charge['montant'], 2) }} <span class="text-sm font-medium text-slate-400">DH</span></p>
                    </div>
                    @if(($charge['statut'] ?? '') === 'en_attente')
                        <button class="bg-primary text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow-lg shadow-primary/20">
                            Payer
                        </button>
                    @else
                        <button class="text-slate-400 hover:text-primary transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-20 text-center px-10">
                <div class="w-16 h-16 bg-slate-100 rounded-3xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h4 class="font-bold text-slate-800 mb-1">Aucune charge</h4>
                <p class="text-slate-400 text-sm">Vous n'avez aucune charge en attente de paiement.</p>
            </div>
        @endforelse
    </div>
    
    <div class="h-20"></div>
</div>
@endsection
