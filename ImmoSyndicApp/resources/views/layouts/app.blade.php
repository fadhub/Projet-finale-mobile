<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <title>{{ config('app.name', 'ImmoSyndic Mobile') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (via CDN for simplicity, or Vite if configured) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#64748b',
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            -webkit-tap-highlight-color: transparent;
            -webkit-touch-callout: none;
            user-select: none;
        }
        .safe-top { padding-top: env(safe-area-inset-top); }
        .safe-bottom { padding-bottom: env(safe-area-inset-bottom); }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-900 antialiased selection:bg-primary/10">
    <div class="min-h-screen flex flex-col pt-safe-top pb-safe-bottom">
        <!-- Header -->
        <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-md border-b border-slate-200 px-4 py-3 flex items-center justify-between shadow-sm">
            <h1 class="text-xl font-bold bg-gradient-to-r from-primary to-blue-600 bg-clip-text text-transparent">ImmoSyndic</h1>
            <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-x-hidden">
            @yield('content')
        </main>

        <!-- Bottom Navigation -->
        <nav class="sticky bottom-0 z-30 bg-white border-t border-slate-200 px-4 py-2 flex justify-between items-center shadow-[0_-1px_10px_rgba(0,0,0,0.05)]">
            <a href="{{ route('incidents.index') }}" @class([
                'flex flex-col items-center transition-colors group px-2',
                'text-primary font-bold' => request()->routeIs('incidents.index'),
                'text-slate-400 hover:text-primary' => !request()->routeIs('incidents.index'),
            ])>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span class="text-[10px] mt-1 italic tracking-tight">Incidents</span>
            </a>
            
            <a href="{{ route('charges.index') }}" @class([
                'flex flex-col items-center transition-colors group px-2',
                'text-primary font-bold' => request()->routeIs('charges.index'),
                'text-slate-400 hover:text-primary' => !request()->routeIs('charges.index'),
            ])>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-[10px] mt-1 italic tracking-tight">Charges</span>
            </a>

            <a href="{{ route('notifications.index') }}" @class([
                'flex flex-col items-center transition-colors group px-2',
                'text-primary font-bold' => request()->routeIs('notifications.index'),
                'text-slate-400 hover:text-primary' => !request()->routeIs('notifications.index'),
            ])>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <span class="text-[10px] mt-1 italic tracking-tight">Alertes</span>
            </a>

            <a href="{{ route('archives.index') }}" @class([
                'flex flex-col items-center transition-colors group px-2',
                'text-primary font-bold' => request()->routeIs('archives.index'),
                'text-slate-400 hover:text-primary' => !request()->routeIs('archives.index'),
            ])>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                </svg>
                <span class="text-[10px] mt-1 italic tracking-tight">Archives</span>
            </a>
        </nav>
    </div>
</body>
</html>
