<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ID Card - <?= $taruna->full_name ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        body { background: #e2e8f0; -webkit-print-color-adjust: exact; }
        .id-card { width: 85.6mm; height: 53.98mm; background: #0f172a; overflow: hidden; position: relative; border: 1px solid #000; }
        @media print { body { background: none; } .no-print { display: none; } }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen">

    <div class="no-print mb-8 text-center">
        <p class="mb-2 text-slate-600">Pastikan layout print di-set ke "Landscape" & Scale 100%</p>
        <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded font-bold shadow hover:bg-blue-700">PRINT NOW</button>
        <a href="/taruna/<?= $taruna->id ?>" class="ml-4 text-blue-600 hover:underline">Kembali</a>
    </div>

    <div class="id-card rounded-xl relative shadow-2xl">
        <div class="absolute inset-0 opacity-30" style="background-image: repeating-linear-gradient(45deg, #000 0, #000 2px, transparent 2px, transparent 10px);"></div>
        
        <div class="absolute top-4 left-4 z-10">
            <h1 class="text-white font-['Orbitron'] text-xs tracking-widest">TARUNA<span class="text-cyan-400">OS</span></h1>
            <p class="text-[8px] text-slate-400 uppercase">SMAIT Taruna Ar Risalah</p>
        </div>

        <div class="absolute top-4 right-4 w-20 h-24 bg-slate-800 border-2 border-cyan-400 rounded overflow-hidden z-10">
            <img src="<?= $taruna->getAvatarUrl() ?>" class="w-full h-full object-cover">
        </div>

        <div class="absolute top-0 right-8 w-8 h-full bg-cyan-400/10 border-l border-r border-cyan-400/20 transform -skew-x-12"></div>

        <div class="absolute bottom-4 left-4 z-10 text-white">
            <h2 class="font-['Orbitron'] text-sm font-bold uppercase leading-tight mb-1 w-48"><?= $taruna->full_name ?></h2>
            <p class="font-['Share_Tech_Mono'] text-xs text-cyan-400">ID: <?= $taruna->nis ?></p>
            <p class="font-['Share_Tech_Mono'] text-[10px] text-slate-400 mt-1">RANK: <?= strtoupper($taruna->rank_level) ?></p>
        </div>

        <div class="absolute bottom-4 right-24 bg-white p-1 rounded">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=50x50&data=<?= $taruna->nis ?>" class="w-10 h-10">
        </div>
    </div>

</body>
</html>