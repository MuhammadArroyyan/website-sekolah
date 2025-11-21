<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>

<div class="p-8 relative z-10">
    
    <div class="flex justify-between items-end mb-8 hud-line pb-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-white">COMMAND CENTER</h2>
            <p class="text-radar text-sm mt-1">SMAIT TARUNA AR RISALAH // TANJUNGPINANG SECTOR</p>
        </div>
        <div class="text-right">
            <p class="text-xs text-slate-500">SYSTEM STATUS</p>
            <div class="flex items-center gap-2 justify-end">
                <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse-slow"></span>
                <span class="text-green-400 font-bold">OPERATIONAL</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass-panel p-6 rounded-lg relative group hover:border-radar transition duration-500">
            <div class="absolute top-0 right-0 p-2 opacity-20 group-hover:opacity-100 transition">
                <svg class="w-12 h-12 text-radar" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-slate-400 text-xs uppercase tracking-wider">Total Personel</h3>
            <p class="text-4xl font-display font-bold text-white mt-2"><?= $total_taruna ?></p>
            <p class="text-xs text-radar mt-2">Active Taruna</p>
        </div>

        <div class="glass-panel p-6 rounded-lg border-l-4 border-gold">
            <h3 class="text-slate-400 text-xs uppercase tracking-wider">Top Performance</h3>
            <?php if($top_taruna): ?>
                <div class="mt-2">
                    <p class="text-xl font-bold text-gold"><?= $top_taruna->full_name ?></p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="px-2 py-0.5 bg-gold/20 text-gold text-xs rounded border border-gold/30">
                            <?= $top_taruna->rank_level ?>
                        </span>
                        <span class="text-sm text-slate-300"><?= $top_taruna->total_points ?> Pts</span>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-slate-500 mt-2">Data belum tersedia</p>
            <?php endif; ?>
        </div>

        <div class="glass-panel p-6 rounded-lg">
            <h3 class="text-slate-400 text-xs uppercase tracking-wider mb-3">Recent Logs</h3>
            <div class="space-y-3">
                <?php foreach($recent_activity as $log): ?>
                <div class="flex gap-3 items-start text-xs">
                    <span class="text-slate-500 font-mono"><?= $log['time'] ?></span>
                    <span class="<?= $log['type'] == 'alert' ? 'text-alert' : ($log['type'] == 'success' ? 'text-green-400' : 'text-slate-300') ?>">
                        <?= $log['event'] ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="glass-panel rounded-lg overflow-hidden">
        <div class="p-4 border-b border-slate-700 bg-slate-800/50 flex justify-between items-center">
            <h3 class="text-radar font-bold tracking-widest uppercase">Elite Squad (Leaderboard)</h3>
            <button class="text-xs text-slate-400 hover:text-white border border-slate-600 px-3 py-1 rounded">VIEW ALL</button>
        </div>
        <table class="w-full text-left text-sm text-slate-400">
            <thead class="text-xs uppercase bg-slate-900/50 text-slate-500">
                <tr>
                    <th class="px-6 py-3">Rank</th>
                    <th class="px-6 py-3">Nama Lengkap</th>
                    <th class="px-6 py-3">NIS</th>
                    <th class="px-6 py-3">Pangkat</th>
                    <th class="px-6 py-3 text-right">Total Poin</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
                <?php foreach($elites as $index => $taruna): ?>
                <tr class="hover:bg-slate-800/50 transition">
                    <td class="px-6 py-4 font-mono text-radar">#0<?= $index + 1 ?></td>
                    <td class="px-6 py-4 font-bold text-white">
                        <a href="/taruna/<?= $taruna->id ?>" 
                        class="hover:text-radar transition underline decoration-slate-700 underline-offset-4 decoration-2 hover:decoration-radar cursor-pointer">
                            <?= $taruna->full_name ?>
                        </a>
                    </td>
                    <td class="px-6 py-4 font-mono"><?= $taruna->nis ?></td>
                    <td class="px-6 py-4">
                        <span class="border px-2 py-1 rounded text-xs uppercase font-bold <?= $taruna->rankColor ?>">
                            <?= $taruna->rank_level ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right font-mono text-white"><?= $taruna->total_points ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>