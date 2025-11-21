<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>

<div class="p-8 relative z-10">
    
    <div class="flex flex-col md:flex-row justify-between items-end mb-8 border-b border-slate-700 pb-6 gap-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-white uppercase tracking-wider">
                Data Pasukan
            </h2>
            <p class="text-radar text-sm mt-1">ACTIVE PERSONNEL DATABASE</p>
        </div>

        <form action="" method="get" class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
            
            <select name="class" onchange="this.form.submit()" class="bg-slate-900 border border-slate-600 text-white text-sm rounded px-4 py-2 focus:border-radar focus:outline-none font-mono">
                <option value="">-- ALL PLATOONS --</option>
                <?php foreach($classes as $c): ?>
                    <option value="<?= $c->id ?>" <?= $classID == $c->id ? 'selected' : '' ?>>
                        <?= $c->name ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <div class="relative">
                <input type="text" name="q" value="<?= esc($keyword) ?>" placeholder="Search Name / NIS..." 
                       class="bg-slate-900 border border-slate-600 text-white text-sm rounded px-4 py-2 w-64 focus:border-radar focus:outline-none pl-10 font-mono placeholder-slate-500">
                <svg class="w-4 h-4 text-slate-500 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            
            <button type="submit" class="bg-radar text-black px-4 py-2 rounded font-bold hover:bg-cyan-400 transition">
                SCAN
            </button>
        </form>
    </div>

    <?php if(count($pasukan) > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach($pasukan as $p): ?>
                <div class="glass-panel p-1 rounded-lg relative group hover:-translate-y-1 transition duration-300">
                    <div class="bg-slate-900/90 p-5 relative z-10 rounded h-full flex flex-col items-center text-center">
                        
                        <div class="absolute top-3 right-3">
                            <div class="w-2 h-2 rounded-full <?= $p->total_points > 150 ? 'bg-green-500 animate-pulse' : ($p->total_points < 100 ? 'bg-red-500' : 'bg-blue-500') ?>"></div>
                        </div>

                        <div class="w-20 h-20 rounded-full border-2 border-slate-700 p-1 mb-3 group-hover:border-radar transition">
                            <img src="<?= $p->getAvatarUrl() ?>" class="w-full h-full rounded-full object-cover bg-slate-800">
                        </div>

                        <h3 class="text-white font-bold font-display text-lg leading-tight mb-1 group-hover:text-radar transition">
                            <?= $p->full_name ?>
                        </h3>
                        <p class="text-slate-500 text-xs font-mono mb-4"><?= $p->nis ?></p>

                        <div class="w-full bg-slate-800 rounded p-2 mb-4 border border-slate-700 flex justify-between items-center">
                            <div class="text-left">
                                <p class="text-[10px] text-slate-500 uppercase">RANK</p>
                                <p class="text-xs font-bold <?= $p->rankColor ?>"><?= $p->rank_level ?></p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] text-slate-500 uppercase">POINTS</p>
                                <p class="text-xs font-bold text-white font-mono"><?= $p->total_points ?></p>
                            </div>
                        </div>

                        <a href="/taruna/<?= $p->id ?>" class="mt-auto w-full py-2 border border-slate-600 text-slate-400 text-xs font-bold uppercase tracking-widest hover:bg-radar hover:text-black hover:border-radar transition rounded">
                            ACCESS DOSSIER
                        </a>
                    </div>
                    
                    <div class="absolute bottom-0 right-0 w-4 h-4 border-b-2 border-r-2 border-radar opacity-50 group-hover:opacity-100 transition"></div>
                </div>
                <?php endforeach; ?>
        </div>

        <div class="mt-8">
             <?= $pager->links('pasukan', 'tactical_full') ?>
        </div>

    <?php else: ?>
        <div class="text-center py-20 opacity-50">
            <svg class="w-16 h-16 mx-auto text-slate-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p class="text-xl font-bold text-white">NO DATA FOUND</p>
            <p class="text-sm text-slate-400">Please refine your search parameters.</p>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>