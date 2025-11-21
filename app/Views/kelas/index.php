<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>
<div class="p-8 max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-6 border-b border-slate-700 pb-4">
        <div>
            <h2 class="text-3xl font-display font-bold text-white uppercase tracking-wider">Manajemen Peleton</h2>
            <p class="text-xs text-slate-500 font-mono">LOGISTIC & CLASS MANAGEMENT</p>
        </div>
        <a href="/pasukan" class="text-slate-500 hover:text-white text-xs font-mono uppercase tracking-widest transition">
            &larr; Back to Roster
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="glass-panel p-6 rounded-lg h-fit border border-green-500/30">
            <h3 class="text-green-400 font-bold mb-4 uppercase text-sm tracking-widest flex items-center gap-2">
                <span class="text-xl">+</span> Bentuk Peleton Baru
            </h3>
            
            <form action="/kelas/store" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-4">
                    <label class="block text-[10px] text-slate-500 mb-1 font-mono uppercase">NAMA KELAS / PELETON</label>
                    <input type="text" name="name" required placeholder="Contoh: X - Khalid Bin Walid" 
                           class="w-full bg-slate-900 border border-slate-600 rounded p-3 text-white focus:border-green-500 focus:outline-none font-mono text-sm transition placeholder-slate-600">
                </div>
                
                <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded hover:bg-green-500 transition uppercase tracking-widest text-xs shadow-lg shadow-green-900/20">
                    KONFIRMASI PEMBENTUKAN
                </button>
            </form>

            <div class="mt-4 p-3 bg-slate-800/50 rounded border border-slate-700">
                <p class="text-[10px] text-slate-400 leading-relaxed">
                    <strong class="text-white">CATATAN:</strong><br>
                    Pastikan nama kelas unik. Kelas yang masih memiliki Taruna aktif tidak dapat dibubarkan (dihapus).
                </p>
            </div>
        </div>

        <div class="md:col-span-2 glass-panel p-0 rounded-lg overflow-hidden border border-slate-700">
            <div class="bg-slate-800/50 px-6 py-4 border-b border-slate-700 flex justify-between items-center">
                <span class="text-xs font-bold text-slate-300 uppercase tracking-widest">DAFTAR PELETON AKTIF</span>
                <span class="text-[10px] font-mono text-slate-500">TOTAL: <?= count($classes) ?> UNIT</span>
            </div>

            <div class="max-h-[500px] overflow-y-auto custom-scrollbar">
                <table class="w-full text-left text-sm text-slate-400">
                    <thead class="text-[10px] uppercase bg-slate-900 text-slate-500 sticky top-0 z-10 shadow-md">
                        <tr>
                            <th class="px-6 py-3 font-mono">IDENTITAS PELETON</th>
                            <th class="px-6 py-3 text-right font-mono">TINDAKAN TAKTIS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        <?php if(empty($classes)): ?>
                            <tr>
                                <td colspan="2" class="px-6 py-8 text-center text-slate-600 italic text-xs">
                                    Belum ada peleton yang dibentuk.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach($classes as $c): ?>
                            <tr class="hover:bg-slate-800/30 transition group">
                                <td class="px-6 py-4 text-white font-bold tracking-wide border-l-2 border-transparent group-hover:border-radar transition-all">
                                    <?= $c->name ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="/kelas/delete/<?= $c->id ?>" method="post" onsubmit="return confirm('PERINGATAN: Anda yakin ingin membubarkan peleton ini?')" class="inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="text-slate-500 hover:text-red-400 text-[10px] uppercase font-bold border border-slate-700 hover:border-red-500 hover:bg-red-500/10 px-3 py-1.5 rounded transition flex items-center gap-1 ml-auto">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            BUBARKAN
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