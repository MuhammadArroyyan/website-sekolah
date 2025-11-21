<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>
<div class="p-6 max-w-xl mx-auto mt-10">
    
    <div class="glass-panel p-8 rounded-lg border border-slate-600 relative overflow-hidden">
        <div class="flex items-center gap-3 mb-6 border-b border-slate-700 pb-4">
            <div class="p-2 bg-slate-800 rounded border border-slate-600 text-radar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <div>
                <h2 class="text-xl font-display font-bold text-white tracking-widest">UPDATE CREDENTIALS</h2>
                <p class="text-xs text-slate-500 font-mono">ENCRYPTION KEY RESET PROTOCOL</p>
            </div>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="bg-red-500/20 border border-red-500 text-red-400 p-3 rounded text-xs font-bold mb-4 font-mono">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="bg-green-500/20 border border-green-500 text-green-400 p-3 rounded text-xs font-bold mb-4 font-mono">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('errors')): ?>
            <div class="bg-red-500/10 border border-red-500/50 text-red-400 p-3 rounded text-xs font-mono mb-4">
                <ul class="list-disc list-inside">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="/auth/updatePassword" method="post" class="space-y-5">
            <?= csrf_field() ?>

            <div>
                <label class="block text-xs text-slate-400 mb-1 font-mono uppercase">Current Password</label>
                <input type="password" name="old_password" required placeholder="Masukkan password lama..." 
                       class="w-full bg-slate-900 border border-slate-600 rounded p-3 text-white focus:border-radar focus:outline-none transition font-mono">
            </div>

            <div class="h-px bg-slate-700 my-2"></div>

            <div>
                <label class="block text-xs text-slate-400 mb-1 font-mono uppercase">New Access Code (Min. 6 Chars)</label>
                <input type="password" name="new_password" required placeholder="Password Baru..." 
                       class="w-full bg-slate-900 border border-slate-600 rounded p-3 text-white focus:border-radar focus:outline-none transition font-mono">
            </div>

            <div>
                <label class="block text-xs text-slate-400 mb-1 font-mono uppercase">Confirm New Code</label>
                <input type="password" name="conf_password" required placeholder="Ulangi Password Baru..." 
                       class="w-full bg-slate-900 border border-slate-600 rounded p-3 text-white focus:border-radar focus:outline-none transition font-mono">
            </div>

            <button type="submit" class="w-full bg-radar text-black font-bold py-3 rounded hover:bg-cyan-400 transition uppercase tracking-widest shadow-lg mt-4">
                UPDATE KEY
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>