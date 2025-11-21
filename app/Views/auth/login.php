<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Access | SMAIT Taruna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { void: '#050b14', naval: '#0f172a', cyan: '#00f0ff', alert: '#ef4444' },
                    fontFamily: { cyber: ['"Orbitron"', 'sans-serif'], mono: ['"Share Tech Mono"', 'monospace'] }
                }
            }
        }
    </script>
</head>
<body class="bg-void h-screen flex items-center justify-center overflow-hidden relative">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-naval to-void z-0"></div>
    <div class="absolute w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5 z-0"></div>

    <div class="relative z-10 w-full max-w-md p-8">
        
        <div class="text-center mb-8">
            <div class="w-16 h-16 border-2 border-cyan mx-auto rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(0,240,255,0.3)] mb-4 animate-pulse">
                <span class="font-cyber text-2xl text-cyan font-bold">T</span>
            </div>
            <h1 class="font-cyber text-white text-2xl tracking-widest">RESTRICTED AREA</h1>
            <p class="font-mono text-cyan text-xs mt-1">AUTHORIZED PERSONNEL ONLY</p>
        </div>

        <div class="bg-naval/50 backdrop-blur border border-slate-700 p-8 rounded-lg shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-cyan/50 shadow-[0_0_10px_#00f0ff] animate-[scan_3s_linear_infinite]"></div>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="bg-alert/20 border border-alert text-alert text-xs font-mono p-3 mb-4 rounded text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="/auth/loginProcess" method="post" class="space-y-6">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">IDENTIFIER (USERNAME)</label>
                    <input type="text" name="username" required class="w-full bg-void border border-slate-600 text-white p-3 rounded focus:border-cyan focus:outline-none font-mono transition placeholder-slate-600" placeholder="Enter Username...">
                </div>

                <div>
                    <label class="block text-xs font-mono text-slate-400 mb-1">ACCESS CODE (PASSWORD)</label>
                    <input type="password" name="password" required class="w-full bg-void border border-slate-600 text-white p-3 rounded focus:border-cyan focus:outline-none font-mono transition placeholder-slate-600" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-cyan text-black font-cyber font-bold py-3 rounded hover:bg-white hover:scale-[1.02] transition duration-200 shadow-[0_0_15px_rgba(0,240,255,0.4)] tracking-widest">
                    INITIATE LOGIN
                </button>
            </form>
        </div>

        <p class="text-center text-slate-600 text-[10px] font-mono mt-6">
            SYSTEM ID: TARUNA-OS v1.0 <br>
            UNAUTHORIZED ACCESS IS A CRIMINAL OFFENSE
        </p>
    </div>

    <style>
        @keyframes scan { 0% { top: -10%; opacity: 0; } 50% { opacity: 1; } 100% { top: 110%; opacity: 0; } }
    </style>
</body>
</html>