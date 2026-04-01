@extends('layouts.app')

@section('content')
<div class="px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Archives</h2>
            <p class="text-slate-500 text-sm italic">Consultez vos documents et règlements</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-indigo-50 flex items-center justify-center shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
            </svg>
        </div>
    </div>
    
    <div class="grid grid-cols-1 gap-4">
        @forelse($documents as $document)
            <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100/50 flex items-center justify-between active:bg-slate-50 transition-colors">
                <div class="flex items-center gap-4">
                    <div @class([
                        'w-12 h-12 rounded-2xl flex items-center justify-center',
                        'bg-red-50 text-red-500' => ($document['categorie'] ?? '') === 'facture',
                        'bg-blue-50 text-blue-500' => ($document['categorie'] ?? '') === 'contrat',
                        'bg-emerald-50 text-emerald-500' => ($document['categorie'] ?? '') === 'règlement',
                        'bg-slate-50 text-slate-400' => !in_array(($document['categorie'] ?? ''), ['facture', 'contrat', 'règlement']),
                    ])>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-sm leading-tight">{{ $document['titre'] }}</h3>
                        <p class="text-[10px] text-slate-400 font-medium uppercase tracking-wider">{{ $document['categorie'] ?? 'Document' }} • {{ \Carbon\Carbon::parse($document['created_at'])->format('d/m/Y') }}</p>
                    </div>
                </div>
                <button onclick="window.location.href='{{ $document['url'] ?? '#' }}'" class="bg-indigo-50 p-2.5 rounded-xl text-indigo-600 hover:scale-110 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </button>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-20 text-center px-10">
                <div class="w-16 h-16 bg-slate-100 rounded-3xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9l-2-2H5a2 2 0 01-2 2v12a2 2 0 012 2z" />
                    </svg>
                </div>
                <h4 class="font-bold text-slate-800 mb-1">Archive vide</h4>
                <p class="text-slate-400 text-sm">Aucun document n'est disponible pour le moment.</p>
            </div>
        @endforelse
    </div>
    
    <div class="h-20"></div>
</div>
@endsection
