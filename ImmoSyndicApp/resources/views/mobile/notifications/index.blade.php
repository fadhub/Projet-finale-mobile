@extends('layouts.app')

@section('content')
<div class="px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Espace Alertes</h2>
            <p class="text-slate-500 text-sm italic">Notifications et communiqués importants</p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-orange-50 flex items-center justify-center shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </div>
    </div>
    
    <div class="space-y-4">
        @forelse($notifications as $notification)
            <div @class([
                'p-5 rounded-3xl transition-all border shadow-sm',
                'bg-white border-slate-100/50' => $notification['lu'],
                'bg-blue-50/30 border-blue-100' => !$notification['lu'],
            ])>
                <div class="flex items-start gap-4">
                    <div @class([
                        'w-10 h-10 rounded-2xl flex-shrink-0 flex items-center justify-center shadow-sm',
                        'bg-slate-100 text-slate-400' => $notification['type'] === 'info',
                        'bg-red-100 text-red-500' => $notification['type'] === 'alerte',
                        'bg-blue-100 text-blue-500' => $notification['type'] === 'paiement',
                    ])>
                        @if($notification['type'] === 'alerte')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        @elseif($notification['type'] === 'paiement')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ \Carbon\Carbon::parse($notification['date_envoi'])->diffForHumans() }}</span>
                            @if(!$notification['lu'])
                                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full"></span>
                            @endif
                        </div>
                        <h3 class="font-bold text-slate-800 leading-tight mb-1">{{ $notification['titre'] }}</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">{{ $notification['message'] }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-20 text-center px-10">
                <div class="w-16 h-16 bg-slate-100 rounded-3xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <h4 class="font-bold text-slate-800 mb-1">Boite vide</h4>
                <p class="text-slate-400 text-sm">Rien de nouveau à signaler pour le moment.</p>
            </div>
        @endforelse
    </div>
    
    <div class="h-20"></div>
</div>
@endsection
