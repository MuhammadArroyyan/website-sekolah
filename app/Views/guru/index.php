<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>
<div class="p-8 max-w-6xl mx-auto">
    
    <div class="flex items-center justify-between mb-6 border-b border-slate-700 pb-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-white uppercase tracking-wider">OFFICER MANAGEMENT</h2>
            <p class="text-xs text-slate-500 font-mono">MANAJEMEN DATA GURU & USTADZ</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="glass-panel p-6 rounded-lg h-fit border border-blue-500/30">
            <h3 class="text-blue-400 font-bold mb-4 uppercase text-sm tracking-widest flex items-center gap-2">
                <span class="text-xl">+</span> Lantik Perwira Baru
            </h3>
            
            <form action="/guru/store" method="post" class="space-y-4">
                <?= csrf_field() ?>
                
                <div>
                    <label class="block text-[10px] text-slate-500 mb-1 font-mono uppercase">NAMA LENGKAP</label>
                    <input type="text" name="nama_lengkap" required placeholder="Contoh: Ustadz Abdullah, Lc." 
                           class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-blue-500 focus:outline-none font-bold placeholder-slate-600">
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-[10px] text-slate-500 mb-1 font-mono uppercase">NIP (OPSIONAL)</label>
                        <input type="text" name="nip" placeholder="-" 
                               class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-blue-500 focus:outline-none font-mono">
                    </div>
                    <div>
                        <label class="block text-[10px] text-slate-500 mb-1 font-mono uppercase">JABATAN</label>
                        <input type="text" name="jabatan" placeholder="Guru MTK / Musyrif" required 
                               class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-blue-500 focus:outline-none">
                    </div>
                </div>

                <div class="p-3 bg-slate-800 rounded border border-slate-700 mt-2">
                    <p class="text-[10px] text-blue-400 font-bold mb-2 uppercase flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        AKUN LOGIN
                    </p>
                    <div class="space-y-2">
                        <input type="text" name="username" required placeholder="Username (untuk login)" 
                               class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-blue-500 focus:outline-none font-mono text-sm">
                        <input type="password" name="password" required placeholder="Password" 
                               class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-blue-500 focus:outline-none font-mono text-sm">
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-500 transition uppercase tracking-widest text-xs shadow-lg shadow-blue-900/20 mt-4">
                    SIMPAN DATA
                </button>
            </form>
        </div>

        <div class="md:col-span-2 glass-panel p-0 rounded-lg overflow-hidden border border-slate-700">
            <div class="bg-slate-800/50 px-6 py-4 border-b border-slate-700 flex justify-between items-center">
                <span class="text-xs font-bold text-slate-300 uppercase tracking-widest">DAFTAR PERWIRA AKTIF</span>
                
                <?php if(isset($guru)): ?>
                    <span class="text-[10px] font-mono text-slate-500"><?= count($guru) ?> OFFICERS</span>
                <?php endif; ?>
            </div>

            <div class="max-h-[600px] overflow-y-auto custom-scrollbar">
                <table class="w-full text-left text-sm text-slate-400">
                    <thead class="text-[10px] uppercase bg-slate-900 text-slate-500 sticky top-0 z-10">
                        <tr>
                            <th class="px-6 py-3 font-mono">NAMA / NIP</th>
                            <th class="px-6 py-3 font-mono">JABATAN</th>
                            <th class="px-6 py-3 font-mono">USERNAME</th>
                            <th class="px-6 py-3 text-right">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        <?php if(empty($guru)): ?>
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-slate-600 italic">
                                    Belum ada data perwira.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($guru as $g): ?>
                            <tr class="hover:bg-slate-800/30 transition group">
                                <td class="px-6 py-4">
                                    <p class="text-white font-bold"><?= esc($g->nama_lengkap) ?></p>
                                    <p class="text-[10px] text-slate-500 font-mono"><?= esc($g->nip ?? '-') ?></p>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-blue-900/30 text-blue-400 border border-blue-500/30 px-2 py-1 rounded text-[10px] uppercase font-bold">
                                        <?= esc($g->jabatan) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-mono text-xs text-slate-300">
                                    <?= esc($g->username) ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="/guru/delete/<?= $g->id ?>" method="post" onsubmit="return confirm('PERINGATAN: Hapus Perwira ini? Akun login juga akan dihapus permanen.')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="text-slate-600 hover:text-red-500 bg-slate-900 p-2 rounded hover:bg-red-500/20 transition border border-slate-700 hover:border-red-500">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>