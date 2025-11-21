<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SMAIT Taruna' ?> | Tactical System</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        naval: '#0f172a',   // Slate 900
                        radar: '#06b6d4',   // Cyan 500
                        alert: '#ef4444',   // Red 500
                        gold: '#eab308',    // Yellow 500
                        panel: '#1e293b',   // Slate 800
                    },
                    fontFamily: {
                        mono: ['"JetBrains Mono"', 'monospace'],
                        display: ['"Rajdhani"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #0f172a; color: #cbd5e1; }
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(6, 182, 212, 0.2);
        }
        .hud-line { border-bottom: 1px solid rgba(6, 182, 212, 0.3); }
        .animate-pulse-slow { animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    </style>
</head>
<body class="font-mono antialiased selection:bg-radar selection:text-naval">

    <div class="fixed left-0 top-0 h-full w-64 bg-panel border-r border-slate-700 flex flex-col">
        <div class="p-6 border-b border-slate-700">
            <h1 class="font-display text-2xl font-bold text-radar tracking-widest">TARUNA<span class="text-white">OS</span></h1>
            <p class="text-xs text-slate-500 mt-1">v.1.0 // ONLINE</p>
        </div>
        
        <nav class="flex-1 p-4 space-y-2">
            <?php if(session()->get('role') == 'komandan' || session()->get('role') == 'admin'): ?>
                <a href="/dashboard" class="block p-3 rounded hover:bg-slate-700 text-slate-400 transition">
                    Dashboard
                </a>            
                <div class="pt-2 pb-1 pl-3 text-[10px] text-slate-600 font-mono uppercase tracking-widest">Master Data</div>
                <a href="/pasukan" class="block p-3 rounded hover:bg-slate-700 text-slate-400 transition">
                    Data Pasukan
                </a>
                <a href="/taruna/create" class="block p-3 rounded hover:bg-slate-700 text-green-400 transition text-xs font-bold border border-dashed border-slate-700 mb-2">
                    + Rekrut Baru
                </a>
                <a href="/kelas" class="block p-3 rounded hover:bg-slate-700 text-slate-400 transition">
                    Manajemen Kelas
                </a>
            <?php endif; ?>
                <a href="/my-dossier" class="block p-3 rounded bg-radar/10 text-radar border-l-4 border-radar">
                    My Dossier
                </a>
        </nav>

        <div class="p-4 border-t border-slate-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded bg-gold/20 border border-gold flex items-center justify-center text-gold font-bold">
                        <?= strtoupper(substr(session()->get('username') ?? 'A', 0, 1)) ?>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Operator</p>
                        <p class="text-sm font-bold text-white capitalize"><?= session()->get('username') ?? 'Guest' ?></p>
                    </div>
                </div>
                <a href="/logout" class="text-slate-500 hover:text-alert transition" title="Logout">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                </a>
            </div>
        </div>
    </div>

    <div class="ml-64 min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" 
             style="background-image: radial-gradient(#06b6d4 1px, transparent 1px); background-size: 30px 30px;">
        </div>

        <div class="fixed top-4 right-4 z-50 w-96 space-y-4 pointer-events-none">
            <?php if(session()->getFlashdata('errors')): ?>
                <div class="bg-red-900/90 backdrop-blur text-red-100 p-4 rounded border-l-4 border-red-500 shadow-2xl pointer-events-auto animate-pulse-slow">
                    <div class="flex items-center gap-2 mb-2 font-bold text-red-400 border-b border-red-700 pb-1">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        MISSION ABORTED
                    </div>
                    <ul class="list-disc list-inside text-xs font-mono">
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('success')): ?>
                <div class="bg-green-900/90 backdrop-blur text-green-100 p-4 rounded border-l-4 border-green-500 shadow-2xl pointer-events-auto">
                    <div class="flex items-center gap-2 font-bold text-green-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        MISSION SUCCESS
                    </div>
                    <p class="font-mono text-xs mt-1"><?= session()->getFlashdata('success') ?></p>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="bg-red-600 text-white p-4 rounded shadow-lg pointer-events-auto font-mono text-sm">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        </div>
        <?= $this->renderSection('content') ?>
    </div>

</body>
</html>