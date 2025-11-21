<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>

<div class="p-6 w-full max-w-6xl mx-auto">
    
    <div class="text-center mb-10">
        <h2 class="text-3xl font-display font-bold text-white tracking-widest uppercase glow-text">
            Global Leaderboard
        </h2>
        <p class="text-xs text-radar font-mono mt-2">LIVE RANKING // DISCIPLINE & TAHFIDZ PERFORMANCE</p>
    </div>

    <?php if(count($ranks) >= 3): ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 items-end">
        
        <div class="order-2 md:order-1 glass-panel p-4 rounded-lg border-t-4 border-slate-400 relative top-4">
            <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-slate-800 border border-slate-500 text-slate-300 px-3 py-1 rounded-full text-xs font-bold">
                RANK 02
            </div>
            <div class="text-center mt-4">
                <img src="<?= base_url('assets/images/taruna/'.$ranks[1]->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-20 h-20 rounded-full mx-auto border-2 border-slate-500 object-cover mb-3">
                <h3 class="text-white font-bold text-sm truncate"><?= $ranks[1]->full_name ?></h3>
                <p class="text-slate-500 text-[10px] mb-2"><?= $ranks[1]->class_name ?></p>
                <div class="flex justify-center gap-3 text-xs font-mono">
                    <span class="text-yellow-400"><?= $ranks[1]->total_points ?> PTS</span>
                    <span class="text-green-400"><?= $ranks[1]->juz_completed ?> JUZ</span>
                </div>
            </div>
        </div>

        <div class="order-1 md:order-2 glass-panel p-6 rounded-lg border-t-4 border-yellow-500 bg-gradient-to-b from-yellow-500/10 to-slate-900 transform md:-translate-y-4 relative z-10 shadow-[0_0_30px_rgba(234,179,8,0.2)]">
            <div class="absolute -top-6 left-1/2 -translate-x-1/2 bg-yellow-500 text-black px-4 py-1 rounded-full text-sm font-bold shadow-lg">
                CHAMPION
            </div>
            <div class="text-center mt-4">
                <div class="relative inline-block">
                    <img src="<?= base_url('assets/images/taruna/'.$ranks[0]->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-28 h-28 rounded-full mx-auto border-4 border-yellow-500 object-cover mb-3">
                    <span class="absolute bottom-2 right-0 text-2xl">👑</span>
                </div>
                <h3 class="text-yellow-500 font-display font-bold text-lg leading-tight mb-1"><?= $ranks[0]->full_name ?></h3>
                <p class="text-slate-400 text-xs mb-4"><?= $ranks[0]->class_name ?></p>
                <div class="grid grid-cols-2 gap-2 bg-slate-800/50 p-3 rounded border border-yellow-500/30">
                    <div>
                        <p class="text-[10px] text-slate-500">POINTS</p>
                        <p class="text-lg font-bold text-white"><?= $ranks[0]->total_points ?></p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-500">QURAN</p>
                        <p class="text-lg font-bold text-green-400"><?= $ranks[0]->juz_completed ?> <span class="text-[10px]">JUZ</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-3 md:order-3 glass-panel p-4 rounded-lg border-t-4 border-orange-700 relative top-4">
            <div class="absolute -top-5 left-1/2 -translate-x-1/2 bg-slate-800 border border-orange-700 text-orange-500 px-3 py-1 rounded-full text-xs font-bold">
                RANK 03
            </div>
            <div class="text-center mt-4">
                <img src="<?= base_url('assets/images/taruna/'.$ranks[2]->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-20 h-20 rounded-full mx-auto border-2 border-orange-700 object-cover mb-3">
                <h3 class="text-white font-bold text-sm truncate"><?= $ranks[2]->full_name ?></h3>
                <p class="text-slate-500 text-[10px] mb-2"><?= $ranks[2]->class_name ?></p>
                <div class="flex justify-center gap-3 text-xs font-mono">
                    <span class="text-yellow-400"><?= $ranks[2]->total_points ?> PTS</span>
                    <span class="text-green-400"><?= $ranks[2]->juz_completed ?> JUZ</span>
                </div>
            </div>
        </div>

    </div>
    <?php endif; ?>

    <div class="glass-panel rounded-lg overflow-hidden border border-slate-700">
        <table class="w-full text-left text-sm text-slate-400">
            <thead class="text-[10px] uppercase bg-slate-900 text-slate-500">
                <tr>
                    <th class="px-6 py-4 text-center w-16">#</th>
                    <th class="px-6 py-4">Identity</th>
                    <th class="px-6 py-4 text-center">Unit</th>
                    <th class="px-6 py-4 text-right">Discipline Pts</th>
                    <th class="px-6 py-4 text-right">Tahfidz (Juz)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                <?php foreach($ranks as $index => $r): ?>
                    <?php $isMe = ($r->id == $my_id); ?>
                    
                    <tr class="transition group hover:bg-slate-800/50 <?= $isMe ? 'bg-radar/10 border-l-4 border-radar' : '' ?>">
                        <td class="px-6 py-4 text-center font-mono font-bold <?= $index < 3 ? 'text-yellow-500' : 'text-slate-600' ?>">
                            <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="<?= base_url('assets/images/taruna/'.$r->photo) ?>" onerror="this.src='<?= base_url('assets/images/ui/default-avatar-l.png') ?>'" class="w-8 h-8 rounded-full object-cover border border-slate-600">
                                <div>
                                    <p class="text-white font-bold <?= $isMe ? 'text-radar' : '' ?>"><?= $r->full_name ?></p>
                                    <p class="text-[10px] text-slate-600 font-mono"><?= $r->nis ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-slate-900 border border-slate-700 px-2 py-1 rounded text-[10px] uppercase text-slate-400">
                                <?= $r->class_name ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right font-mono text-white font-bold text-lg">
                            <?= $r->total_points ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <div class="h-2 w-24 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-green-500" style="width: <?= ($r->juz_completed / 30) * 100 ?>%"></div>
                                </div>
                                <span class="font-mono text-green-400 font-bold"><?= $r->juz_completed ?></span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>