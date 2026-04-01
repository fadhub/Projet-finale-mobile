<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <title>ImmoSyndic — Bienvenue</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Outfit', 'sans-serif'] },
                    colors: { primary: '#2563eb' }
                }
            }
        }
    </script>
    <style>
        * { -webkit-tap-highlight-color: transparent; }

        body {
            margin: 0;
            font-family: 'Outfit', sans-serif;
            background: #0f172a;
            min-height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* ===== Animated background ===== */
        .bg-animated {
            position: fixed;
            inset: 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f172a 100%);
            z-index: 0;
            pointer-events: none;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: float 8s ease-in-out infinite;
            opacity: 0.4;
        }
        .orb-1 {
            width: 350px; height: 350px;
            background: radial-gradient(circle, #3b82f6, #1d4ed8);
            top: -80px; left: -80px;
            animation-delay: 0s;
        }
        .orb-2 {
            width: 280px; height: 280px;
            background: radial-gradient(circle, #0ea5e9, #0284c7);
            bottom: 100px; right: -60px;
            animation-delay: 3s;
        }
        .orb-3 {
            width: 200px; height: 200px;
            background: radial-gradient(circle, #6366f1, #4338ca);
            bottom: -40px; left: 40%;
            animation-delay: 5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50%       { transform: translateY(-30px) scale(1.05); }
        }

        /* ===== Grid dots ===== */
        .grid-dots {
            position: fixed;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.07) 1px, transparent 1px);
            background-size: 28px 28px;
            z-index: 0;
            pointer-events: none;
        }

        /* ===== Content ===== */
        .content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem 1.5rem;
            padding-top: env(safe-area-inset-top);
            padding-bottom: env(safe-area-inset-bottom);
        }

        /* ===== Logo ===== */
        .logo-wrapper {
            width: 110px;
            height: 110px;
            border-radius: 32px;
            background: linear-gradient(145deg, #1e40af, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 60px rgba(59,130,246,0.5), 0 0 0 1px rgba(255,255,255,0.1);
            margin-bottom: 2rem;
            animation: logoEntrance 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        @keyframes logoEntrance {
            from { opacity: 0; transform: scale(0.4) rotate(-10deg); }
            to   { opacity: 1; transform: scale(1) rotate(0deg); }
        }

        .logo-letter {
            font-size: 3.5rem;
            font-weight: 900;
            color: white;
            line-height: 1;
            letter-spacing: -2px;
        }

        /* ===== Text ===== */
        .hero-title {
            font-size: 2.4rem;
            font-weight: 800;
            color: white;
            text-align: center;
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 0.75rem;
            animation: slideUp 0.7s 0.2s ease both;
        }

        .hero-title span {
            background: linear-gradient(90deg, #60a5fa, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-sub {
            font-size: 1rem;
            color: rgba(255,255,255,0.5);
            text-align: center;
            line-height: 1.6;
            max-width: 300px;
            margin-bottom: 3rem;
            animation: slideUp 0.7s 0.35s ease both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ===== Feature Pills ===== */
        .pills {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 3rem;
            animation: slideUp 0.7s 0.45s ease both;
        }

        .pill {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4rem 0.9rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.7);
            font-size: 0.78rem;
            font-weight: 500;
            backdrop-filter: blur(8px);
        }

        .pill-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
        }

        /* ===== CTA Button ===== */
        .btn-primary {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            width: 100%;
            max-width: 320px;
            padding: 1.1rem 2rem;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            font-size: 1.05rem;
            font-weight: 700;
            border-radius: 18px;
            box-shadow: 0 10px 40px rgba(59,130,246,0.5);
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            animation: slideUp 0.7s 0.55s ease both;
            letter-spacing: 0.3px;
        }

        .btn-primary:active {
            transform: scale(0.97);
            box-shadow: 0 5px 20px rgba(59,130,246,0.4);
        }

        .btn-primary svg {
            width: 20px; height: 20px;
        }

        /* ===== Stats strip ===== */
        .stats-strip {
            display: flex;
            gap: 1.5rem;
            margin-top: 3rem;
            animation: slideUp 0.7s 0.65s ease both;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
        }

        .stat-label {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .stat-divider {
            width: 1px;
            background: rgba(255,255,255,0.1);
            align-self: stretch;
        }

        /* ===== Pulse ring on logo ===== */
        .pulse-ring {
            position: absolute;
            border-radius: 50%;
            border: 2px solid rgba(59,130,246,0.3);
            animation: pulseRing 3s ease-out infinite;
        }
        @keyframes pulseRing {
            0%   { width: 110px; height: 110px; opacity: 0.8; border-radius: 32px; }
            100% { width: 160px; height: 160px; opacity: 0; border-radius: 48px; }
        }
    </style>
</head>
<body>

<!-- Animated Background -->
<div class="bg-animated">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>
<div class="grid-dots"></div>

<!-- Main Content -->
<div class="content">

    <!-- Logo -->
    <div style="position:relative; display:flex; align-items:center; justify-content:center; margin-bottom:2rem;">
        <div class="pulse-ring"></div>
        <div class="logo-wrapper" style="margin-bottom:0; overflow:hidden; background:transparent;">
            <img src="{{ asset('logo.png') }}" alt="ImmoSyndic Logo" class="w-full h-full object-cover rounded-[32px] shadow-sm">
        </div>
    </div>

    <!-- Title -->
    <h1 class="hero-title">
        Gérez votre<br><span>copropriété</span><br>simplement.
    </h1>
    <p class="hero-sub">
        Incidents, charges, archives et alertes — tout au bout de vos doigts.
    </p>

    <!-- Feature Pills -->
    <div class="pills">
        <div class="pill">
            <div class="pill-dot" style="background:#f87171;"></div>
            Incidents
        </div>
        <div class="pill">
            <div class="pill-dot" style="background:#34d399;"></div>
            Charges
        </div>
        <div class="pill">
            <div class="pill-dot" style="background:#60a5fa;"></div>
            Alertes
        </div>
        <div class="pill">
            <div class="pill-dot" style="background:#a78bfa;"></div>
            Archives
        </div>
    </div>

    <!-- CTA -->
    <form action="{{ route('incidents.index') }}" method="GET" class="w-full max-w-[320px] relative z-[9999]">
        <button type="submit" 
                id="access-btn"
                onclick="this.innerHTML='Connexion...'; this.style.opacity='0.7'; this.style.pointerEvents='none';"
                class="btn-primary w-full pointer-events-auto" 
                style="cursor: pointer !important;">
            Accéder à l'application
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </button>
    </form>

    <!-- Stats -->
    <div class="stats-strip">
        <div class="stat-item">
            <div class="stat-value">4</div>
            <div class="stat-label">Modules</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <div class="stat-value">100%</div>
            <div class="stat-label">Mobile</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <div class="stat-value">Live</div>
            <div class="stat-label">Données</div>
        </div>
    </div>

</div>



</body>
</html>
