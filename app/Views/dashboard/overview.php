<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>

<div class="p-8 relative z-10">
    
    <div class="flex flex-col md:flex-row justify-between items-end mb-8 border-b border-slate-700 pb-4 gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-white">COMMAND CENTER</h2>
            <p class="text-radar text-sm mt-1">SMAIT TARUNA AR RISALAH // TANJUNGPINANG SECTOR</p>
        </div>
        <div class="text-right">
            <p class="text-[10px] text-slate-500 uppercase tracking-widest">SYSTEM STATUS</p>
            <div class="flex items-center gap-2 justify-end mt-1">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                <span class="text-green-400 font-bold text-xs tracking-wider">OPERATIONAL</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <div class="glass-panel p-6 rounded-lg relative group hover:border-radar transition duration-500">
            <a href="/pasukan" class="absolute inset-0 z-20" title="Lihat Data Pasukan"></a>
            
            <div class="absolute top-0 right-0 p-2 opacity-20 group-hover:opacity-100 transition duration-500">
                <svg class="w-12 h-12 text-radar" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>

            <div class="relative z-10">
                <h3 class="text-slate-400 text-xs uppercase tracking-wider group-hover:text-white transition">Total Personel</h3>
                <p class="text-4xl font-display font-bold text-white mt-2"><?= $total_taruna ?></p>
                <p class="text-xs text-radar mt-2 flex items-center gap-1">
                    Active Taruna 
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </p>
            </div>
        </div>

        <div class="glass-panel p-6 rounded-lg border-l-4 border-gold relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-gold/10 rounded-full blur-xl pointer-events-none"></div>
            <h3 class="text-slate-400 text-xs uppercase tracking-wider">Top Performance</h3>
            <?php if($top_taruna): ?>
                <div class="mt-3 relative z-10">
                    <p class="text-xl font-bold text-gold truncate"><?= $top_taruna->full_name ?></p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="px-2 py-0.5 bg-gold/20 text-gold text-[10px] font-bold rounded border border-gold/30 uppercase">
                            <?= $top_taruna->rank_level ?>
                        </span>
                        <span class="text-sm text-white font-mono"><?= $top_taruna->total_points ?> Pts</span>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-slate-500 mt-2 text-sm italic">Data belum tersedia</p>
            <?php endif; ?>
        </div>

        <div class="glass-panel p-6 rounded-lg flex flex-col h-full">
            <h3 class="text-slate-400 text-xs uppercase tracking-wider mb-3 flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span> Recent Logs
            </h3>
            
            <div class="space-y-3 overflow-y-auto max-h-32 pr-1 custom-scrollbar">
                <?php if(empty($recent_activity)): ?>
                    <div class="text-center py-4 opacity-50">
                        <svg class="w-8 h-8 mx-auto text-slate-600 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-[10px] text-slate-500 font-mono">NO RECENT SIGNALS</p>
                    </div>
                <?php else: ?>
                    <?php foreach($recent_activity as $log): ?>
                    <div class="flex gap-3 items-start text-xs border-b border-slate-800/50 pb-2 last:border-0 hover:bg-slate-800/30 rounded px-1 transition">
                        <span class="text-slate-500 font-mono whitespace-nowrap pt-0.5">
                            <?= date('H:i', strtotime($log->created_at)) ?>
                        </span>
                        <div>
                            <span class="<?= $log->type == 'demerit' ? 'text-alert' : 'text-green-400' ?> font-bold uppercase text-[10px] tracking-wide">
                                <?= $log->category ?>
                            </span>
                            <p class="text-slate-300 text-[10px] mt-0.5 truncate w-32 md:w-40">
                                <?= $log->full_name ?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="glass-panel rounded-lg overflow-hidden border border-slate-700">
        <div class="p-4 border-b border-slate-700 bg-slate-800/50 flex justify-between items-center">
            <h3 class="text-radar font-bold tracking-widest uppercase text-sm">Elite Squad (Leaderboard)</h3>
            <a href="/leaderboard" class="text-[10px] text-slate-400 hover:text-white border border-slate-600 px-3 py-1 rounded transition hover:bg-slate-700 font-mono uppercase">
                View All
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-400">
                <thead class="text-[10px] uppercase bg-slate-900 text-slate-500 font-mono">
                    <tr>
                        <th class="px-6 py-3">Rank</th>
                        <th class="px-6 py-3">Nama Lengkap</th>
                        <th class="px-6 py-3">NIS</th>
                        <th class="px-6 py-3">Pangkat</th>
                        <th class="px-6 py-3 text-right">Total Poin</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    <?php if(empty($elites)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-600 italic">Belum ada data pasukan.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($elites as $index => $taruna): ?>
                        <tr class="hover:bg-slate-800/50 transition group">
                            <td class="px-6 py-4 font-mono text-radar font-bold">#0<?= $index + 1 ?></td>
                            <td class="px-6 py-4 font-bold text-white">
                                <a href="/taruna/<?= $taruna->id ?>" class="hover:text-radar hover:underline decoration-radar decoration-2 underline-offset-4 transition">
                                    <?= $taruna->full_name ?>
                                </a>
                            </td>
                            <td class="px-6 py-4 font-mono text-xs"><?= $taruna->nis ?></td>
                            <td class="px-6 py-4">
                                <span class="border px-2 py-1 rounded text-[10px] uppercase font-bold <?= $taruna->rankColor ?>">
                                    <?= $taruna->rank_level ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-mono text-white font-bold"><?= $taruna->total_points ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?= $this->endSection() ?>