<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>

<div class="p-6 pb-0">
    <a href="/" class="inline-flex items-center text-radar hover:text-white transition text-sm font-mono">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        RETURN TO COMMAND CENTER
    </a>
</div>

<div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-1">
        <div class="glass-panel p-1 rounded-lg relative overflow-hidden">
            <div class="absolute inset-0 opacity-20" style="background-image: repeating-linear-gradient(45deg, #000 0, #000 10px, transparent 10px, transparent 20px);"></div>
            
            <div class="bg-slate-900/90 p-6 relative z-10">
                <div class="text-center mb-6">
                    <div class="w-32 h-32 mx-auto rounded-full border-4 border-slate-700 p-1 relative">
                        <img src="<?= $taruna->getAvatarUrl() ?>" alt="Profile" class="w-full h-full rounded-full object-cover bg-slate-800">
                        <div class="absolute bottom-0 right-0 bg-slate-900 border border-radar text-radar text-xs font-bold px-2 py-1 rounded">
                            <?= substr($taruna->rank_level, 0, 3) ?>
                        </div>
                    </div>
                    <h2 class="text-xl font-bold text-white mt-4 font-display uppercase tracking-wide"><?= $taruna->full_name ?></h2>
                    <p class="text-slate-500 text-sm font-mono">NIS. <?= $taruna->nis ?></p>
                </div>

                <div class="grid grid-cols-2 gap-4 text-center mb-6">
                    <div class="bg-slate-800 p-3 rounded border border-slate-700">
                        <p class="text-xs text-slate-500 uppercase">KELAS</p>
                        <p class="text-white font-mono"><?= $taruna->class_name ?? 'UNASSIGNED' ?></p>
                    </div>
                    <div class="bg-slate-800 p-3 rounded border border-slate-700">
                        <p class="text-xs text-slate-500 uppercase">STATUS</p>
                        <p class="text-green-400 font-bold text-sm">ACTIVE DU</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <button class="w-full py-2 bg-radar/10 border border-radar text-radar hover:bg-radar hover:text-black transition font-mono text-xs uppercase tracking-widest font-bold">
                        PRINT ID CARD
                    </button>
                    <button class="w-full py-2 border border-slate-600 text-slate-400 hover:text-white transition font-mono text-xs uppercase tracking-widest">
                        EDIT DOSSIER
                    </button>
                    <button onclick="toggleModal('tahfidzModal')" class="w-full py-2 bg-green-500/10 border border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition font-mono text-xs uppercase tracking-widest mt-4">
                        [ UPDATE HAFALAN ]
                    </button>
                    <button onclick="toggleModal('reportModal')" class="w-full py-2 bg-red-500/10 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition font-mono text-xs uppercase tracking-widest mt-2">
                        [!REPORT ACTION!]
                    </button>
                </div>
            </div>
            
            <div class="h-8 bg-white mt-1 opacity-80" style="background-image: linear-gradient(90deg, #000 50%, transparent 50%); background-size: 4px 100%;"></div>
        </div>
    </div>

    <div class="lg:col-span-2 space-y-6">
        
        <div class="glass-panel p-6 rounded-lg">
            <h3 class="text-radar font-bold tracking-widest uppercase text-sm mb-4 border-b border-slate-700 pb-2">
                PERFORMANCE MONITOR
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center md:text-left">
                    <p class="text-xs text-slate-500 uppercase">Total Discipline Points</p>
                    <p class="text-5xl font-display font-bold text-white mt-2"><?= $taruna->total_points ?></p>
                    <p class="text-xs text-slate-400 mt-1">Rank Level: <span class="<?= $taruna->rankColor ?>"><?= $taruna->rank_level ?></span></p>
                </div>
                
                <div class="col-span-2 flex flex-col justify-end">
                    <div class="flex justify-between text-xs text-slate-400 mb-1">
                        <span>Prajurit</span>
                        <span>Jenderal</span>
                    </div>
                    <div class="h-4 bg-slate-800 rounded-full overflow-hidden border border-slate-700 relative">
                        <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-blue-600 to-cyan-400" style="width: <?= ($taruna->total_points / 200) * 100 ?>%"></div>
                    </div>
                    <p class="text-right text-xs text-radar mt-1">Next Promotion: +<?= 200 - $taruna->total_points ?> pts</p>
                </div>
            </div>
        </div>
        <div class="glass-panel p-6 rounded-lg mb-6">
            <div class="flex justify-between items-center mb-4 border-b border-slate-700 pb-2">
                <h3 class="text-radar font-bold tracking-widest uppercase text-sm">
                    QURAN SECTOR MAP (30 JUZ)
                </h3>
                <span class="text-xs font-mono text-white">
                    SECURED: <span class="text-radar text-lg font-bold"><?= $totalHafalan ?></span>/30
                </span>
            </div>

            <div class="grid grid-cols-5 md:grid-cols-10 gap-2">
                <?php foreach($juzMap as $juz => $status): ?>
                    
                    <?php 
                        // Tentukan Warna Berdasarkan Status
                        $bgClass = 'bg-slate-800 border-slate-700 text-slate-600'; // Default (Locked)
                        $glow = '';
                        
                        if ($status == 'completed') {
                            $bgClass = 'bg-green-500/20 border-green-500 text-green-400 shadow-[0_0_10px_rgba(74,222,128,0.3)]';
                        } elseif ($status == 'progress') {
                            $bgClass = 'bg-yellow-500/20 border-yellow-500 text-yellow-400 animate-pulse';
                        }
                    ?>

                    <div class="aspect-square border rounded flex items-center justify-center relative group cursor-help <?= $bgClass ?>">
                        <span class="font-mono text-xs font-bold"><?= $juz ?></span>
                        
                        <div class="absolute bottom-full mb-2 hidden group-hover:block w-24 bg-black border border-slate-600 text-center rounded p-1 z-20">
                            <p class="text-[10px] text-slate-300 uppercase">JUZ <?= $juz ?></p>
                            <p class="text-[10px] font-bold text-white uppercase"><?= $status ?></p>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

            <div class="flex gap-4 mt-4 text-[10px] uppercase text-slate-500 justify-center">
                <div class="flex items-center gap-1"><div class="w-2 h-2 bg-slate-800 border border-slate-600"></div> Locked</div>
                <div class="flex items-center gap-1"><div class="w-2 h-2 bg-yellow-500/20 border border-yellow-500"></div> In Progress</div>
                <div class="flex items-center gap-1"><div class="w-2 h-2 bg-green-500/20 border border-green-500"></div> Secured</div>
            </div>
        </div>
        <div class="glass-panel p-6 rounded-lg">
            <div class="flex justify-between items-center mb-4 border-b border-slate-700 pb-2">
                <h3 class="text-radar font-bold tracking-widest uppercase text-sm">
                    MISSION LOGS
                </h3>
                <span class="text-xs bg-slate-800 text-slate-300 px-2 py-1 rounded">Recent 3 Activities</span>
            </div>

            <div class="space-y-4">
                <?php foreach($logs as $log): ?>
                <div class="flex items-start gap-4 group">
                    <div class="w-16 text-center bg-slate-800/50 border border-slate-700 rounded p-1">
                        <span class="block text-xs text-slate-500"><?= date('M', strtotime($log->created_at)) ?></span>
                        <span class="block text-lg font-bold text-white font-display"><?= date('d', strtotime($log->created_at)) ?></span>
                    </div>
                    <div class="flex-1 border-b border-slate-800 pb-4 group-last:border-0">
                        <div class="flex justify-between">
                            <p class="text-white font-bold text-sm uppercase"><?= $log->category ?></p>
                            <span class="font-mono text-xs font-bold <?= $log->points > 0 ? 'text-green-400' : 'text-alert' ?>">
                                <?= $log->points > 0 ? '+' : '' ?><?= $log->points ?> PTS
                            </span>
                        </div>
                        <p class="text-slate-400 text-sm mt-1"><?= $log->description ?></p>
                        <p class="text-xs text-slate-600 mt-1">Type: <?= strtoupper($log->type) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-4 text-center">
                <button class="text-xs text-slate-500 hover:text-radar transition uppercase tracking-widest">View Full History</button>
            </div>
        </div>

    </div>
</div>
<div id="reportModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm" onclick="toggleModal('reportModal')"></div>

    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md">
        <div class="glass-panel rounded-lg border border-slate-600 shadow-2xl shadow-black">
            <div class="p-4 border-b border-slate-700 flex justify-between items-center bg-slate-800/50">
                <h3 class="text-white font-bold font-display tracking-wider">NEW TACTICAL REPORT</h3>
                <button onclick="toggleModal('reportModal')" class="text-slate-400 hover:text-white">&times;</button>
            </div>

            <form action="/discipline/store" method="post" class="p-6 space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="taruna_id" value="<?= $taruna->id ?>">

                <div class="grid grid-cols-2 gap-4">
                    <label class="cursor-pointer">
                        <input type="radio" name="type" value="demerit" class="peer sr-only" checked>
                        <div class="p-3 text-center border border-slate-600 rounded bg-slate-800 text-slate-400 peer-checked:bg-red-500/20 peer-checked:border-red-500 peer-checked:text-red-400 transition">
                            PELANGGARAN
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="type" value="merit" class="peer sr-only">
                        <div class="p-3 text-center border border-slate-600 rounded bg-slate-800 text-slate-400 peer-checked:bg-green-500/20 peer-checked:border-green-500 peer-checked:text-green-400 transition">
                            PRESTASI
                        </div>
                    </label>
                </div>

                <div>
                    <label class="block text-xs text-slate-500 mb-1">CATEGORY / PASAL</label>
                    <input type="text" name="category" required placeholder="Contoh: Terlambat, Hafalan Selesai..." 
                           class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-radar focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-xs text-slate-500 mb-1">POINTS VALUE (Absolute)</label>
                    <input type="number" name="points" required min="1" placeholder="10" 
                           class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-radar focus:outline-none transition font-mono">
                    <p class="text-xs text-slate-600 mt-1">*Masukkan angka positif saja. Sistem akan otomatis minus jika pelanggaran.</p>
                </div>

                <div>
                    <label class="block text-xs text-slate-500 mb-1">DESCRIPTION</label>
                    <textarea name="description" rows="3" placeholder="Kronologi kejadian..." 
                              class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-radar focus:outline-none transition"></textarea>
                </div>

                <button type="submit" class="w-full py-3 bg-radar text-black font-bold hover:bg-cyan-400 transition rounded mt-4">
                    SUBMIT REPORT
                </button>
            </form>
        </div>
    </div>
</div>
<div id="tahfidzModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm" onclick="toggleModal('tahfidzModal')"></div>
        
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md">
            <div class="glass-panel rounded-lg border border-green-500/30 shadow-2xl shadow-green-900/20">
                <div class="p-4 border-b border-slate-700 flex justify-between items-center bg-slate-800/50">
                    <h3 class="text-green-400 font-bold font-display tracking-wider">UPDATE QURAN PROGRESS</h3>
                    <button onclick="toggleModal('tahfidzModal')" class="text-slate-400 hover:text-white">&times;</button>
                </div>
                
                <form action="/tahfidz/store" method="post" class="p-6 space-y-4">
                    <?= csrf_field() ?>
                    <input type="hidden" name="taruna_id" value="<?= $taruna->id ?>">

                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1">
                            <label class="block text-xs text-slate-500 mb-1">JUZ</label>
                            <select name="juz" class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-green-500 focus:outline-none font-mono">
                                <?php for($i=1; $i<=30; $i++): ?>
                                    <option value="<?= $i ?>">Juz <?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <div class="col-span-2">
                            <label class="block text-xs text-slate-500 mb-1">AYAT / HALAMAN</label>
                            <input type="text" name="verses" placeholder="Contoh: 1-50 atau Full" 
                                   class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-green-500 focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs text-slate-500 mb-1">NAMA SURAT</label>
                        <input type="text" name="surah" required placeholder="Al-Baqarah" 
                               class="w-full bg-slate-900 border border-slate-700 rounded p-2 text-white focus:border-green-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-xs text-slate-500 mb-2">STATUS HAFALAN</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="cursor-pointer">
                                <input type="radio" name="status" value="mengulang" class="peer sr-only" checked>
                                <div class="p-2 text-center text-xs border border-slate-600 rounded bg-slate-800 text-slate-400 peer-checked:bg-yellow-500/20 peer-checked:border-yellow-500 peer-checked:text-yellow-400 transition">
                                    ON PROGRESS
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="status" value="lancar" class="peer sr-only">
                                <div class="p-2 text-center text-xs border border-slate-600 rounded bg-slate-800 text-slate-400 peer-checked:bg-green-400/20 peer-checked:border-green-400 peer-checked:text-green-400 transition">
                                    LANCAR
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="status" value="selesai" class="peer sr-only">
                                <div class="p-2 text-center text-xs border border-slate-600 rounded bg-slate-800 text-slate-400 peer-checked:bg-green-500 peer-checked:border-green-500 peer-checked:text-white peer-checked:shadow-[0_0_10px_rgba(74,222,128,0.5)] transition font-bold">
                                    SECURED (30)
                                </div>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-3 bg-green-600 text-white font-bold hover:bg-green-500 transition rounded mt-4 tracking-widest">
                        SAVE PROGRESS
                    </button>
                </form>
            </div>
        </div>
    </div>

<script>
    function toggleModal(modalID) {
        document.getElementById(modalID).classList.toggle('hidden');
    }
</script>
<?= $this->endSection() ?>