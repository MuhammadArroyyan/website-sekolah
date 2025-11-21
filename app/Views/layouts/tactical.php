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
            
            <?php 
                $uri = uri_string();
                $role = session()->get('role'); 
                
                $active   = 'bg-radar/10 text-radar border-l-4 border-radar font-bold shadow-[0_0_10px_rgba(6,182,212,0.1)]';
                $inactive = 'text-slate-400 hover:bg-slate-700 hover:text-white transition border-l-4 border-transparent';
                
                // GRUP AKSES
                $isStaff = ($role == 'komandan' || $role == 'admin' || $role == 'ustadz'); // Admin + Guru
                $isSuperAdmin = ($role == 'komandan' || $role == 'admin'); // Hanya Admin
            ?>

            <?php if($isStaff): ?>
                
                <a href="/dashboard" class="block p-3 rounded <?= str_contains($uri, 'dashboard') ? $active : $inactive ?>">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </span>
                </a>

                <div class="pt-4 pb-1 pl-3 text-[10px] text-slate-600 font-mono uppercase tracking-widest font-bold">Command & Control</div>
                
                <a href="/pasukan" class="block p-3 rounded <?= str_contains($uri, 'pasukan') ? $active : $inactive ?>">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        Data Pasukan
                    </span>
                </a>

            <?php endif; ?>


            <?php if($isSuperAdmin): ?>
                
                <a href="/taruna/create" class="block p-3 rounded <?= str_contains($uri, 'taruna/create') ? $active : $inactive ?>">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        Rekrut Baru
                    </span>
                </a>

                <a href="/kelas" class="block p-3 rounded <?= str_contains($uri, 'kelas') ? $active : $inactive ?>">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Manajemen Peleton
                    </span>
                </a>

                <div class="pt-2 pb-1 pl-3 text-[10px] text-slate-600 font-mono uppercase tracking-widest font-bold">Super Admin</div>

                <a href="/guru" class="block p-3 rounded <?= str_contains($uri, 'guru') ? $active : $inactive ?>">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Manajemen Perwira
                    </span>
                </a>

            <?php endif; ?>


            <?php if($role == 'taruna'): ?>
                <a href="/my-dossier" class="block p-3 rounded <?= str_contains($uri, 'my-dossier') ? $active : $inactive ?>">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        My Dossier
                    </span>
                </a>
            <?php endif; ?>

            <div class="pt-4 pb-1 pl-3 text-[10px] text-slate-600 font-mono uppercase tracking-widest font-bold">Stats Center</div>

            <a href="/leaderboard" class="block p-3 rounded <?= str_contains($uri, 'leaderboard') ? $active : $inactive ?>">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                    Leaderboard
                </span>
            </a>
            
            <a href="/change-password" class="block p-3 rounded <?= str_contains($uri, 'change-password') ? $active : $inactive ?>">
                <span class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Ganti Password
                </span>
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