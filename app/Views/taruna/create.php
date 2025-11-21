<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>
<div class="p-6 max-w-3xl mx-auto">
    <a href="/pasukan" class="inline-flex items-center text-slate-500 hover:text-white mb-4 text-xs font-mono">
        &larr; KEMBALI KE DAFTAR PASUKAN
    </a>

    <div class="glass-panel p-8 rounded-lg border border-green-500/30">
        <h2 class="text-2xl font-display font-bold text-white mb-2">REKRUT TARUNA BARU</h2>
        <p class="text-xs text-green-400 font-mono mb-6">NEW RECRUITMENT PROTOCOL</p>
        
        <form action="/taruna/store" method="post" class="space-y-6">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-slate-500 mb-1 font-mono">FULL NAME</label>
                    <input type="text" name="full_name" required placeholder="Nama Lengkap Siswa" class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-green-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs text-slate-500 mb-1 font-mono">NIS (Akan jadi Username Login)</label>
                    <input type="text" name="nis" required placeholder="Contoh: 2025001" class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-green-500 focus:outline-none font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-slate-500 mb-1 font-mono">ASSIGNED UNIT (CLASS)</label>
                    <select name="class_id" required class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-green-500 focus:outline-none">
                        <?php foreach($classes as $c): ?>
                            <option value="<?= $c->id ?>"><?= $c->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-slate-500 mb-1 font-mono">GENDER</label>
                    <select name="gender" required class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-green-500 focus:outline-none">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="bg-slate-800 p-4 rounded border border-slate-700">
                <p class="text-xs text-slate-400 mb-1">SYSTEM NOTE:</p>
                <ul class="text-[10px] text-slate-500 list-disc list-inside">
                    <li>Akun login akan dibuat otomatis.</li>
                    <li>Username = NIS.</li>
                    <li>Password Default = 123456.</li>
                    <li>Pangkat awal = Prajurit Siswa (100 Poin).</li>
                </ul>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded hover:bg-green-500 transition uppercase tracking-widest shadow-lg">
                PROSES PENDAFTARAN
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>