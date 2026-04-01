@extends('layouts.app')

@section('content')
<div class="px-6 py-8">
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('incidents.index') }}" class="w-10 h-10 rounded-2xl bg-white shadow-sm border border-slate-100 flex items-center justify-center text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Signaler un Problème</h2>
    </div>

    <form action="{{ route('incidents.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-700 ml-1">Titre de l'incident</label>
            <input type="text" name="titre" required placeholder="Ex: Fuite d'eau, Ampoule grillée..." 
                   class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-800 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-700 ml-1">Localisation</label>
            <input type="text" name="localisation" placeholder="Ex: Hall d'entrée, Parking..." 
                   class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-800 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
        </div>

        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-700 ml-1">Priorité</label>
            <select name="priorite" class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-800 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all appearance-none cursor-pointer">
                <option value="Basse">Basse</option>
                <option value="Moyenne" selected>Moyenne</option>
                <option value="Haute">Haute</option>
            </select>
        </div>

        <div class="space-y-2">
            <label class="text-sm font-semibold text-slate-700 ml-1">Description détaillée</label>
            <textarea name="description" rows="4" required placeholder="Décrivez le problème plus en détail..." 
                      class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3.5 text-slate-800 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all resize-none"></textarea>
        </div>

        <div class="pt-4">
            <button type="submit" 
                    id="submit-btn"
                    onclick="this.innerHTML='Envoi en cours...'; this.style.opacity='0.7';"
                    class="w-full bg-primary text-white font-bold py-4 rounded-2xl shadow-lg shadow-primary/20 active:scale-[0.98] transition-all">
                Envoyer le Signalement
            </button>
        </div>
    </form>
</div>

<style>
    /* Custom select arrow */
    select {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.25rem;
    }
</style>
@endsection
