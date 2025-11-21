<?= $this->extend('layouts/tactical') ?>

<?= $this->section('content') ?>
<div class="p-6 max-w-3xl mx-auto">
    <a href="/taruna/<?= $taruna->id ?>" class="inline-flex items-center text-slate-500 hover:text-white mb-4 text-xs font-mono">
        &larr; CANCEL EDITING
    </a>

    <div class="glass-panel p-8 rounded-lg border border-slate-700 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-radar"></div>
        <h2 class="text-2xl font-display font-bold text-white mb-6 border-b border-slate-700 pb-4">
            EDIT PERSONNEL DOSSIER
        </h2>
        
        <form action="/taruna/update/<?= $taruna->id ?>" method="post" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>
            
            <div class="flex items-center gap-6 bg-slate-800/50 p-4 rounded border border-slate-700">
                <img src="<?= $taruna->getAvatarUrl() ?>" class="w-20 h-20 rounded-full border-2 border-radar object-cover bg-slate-900">
                <div class="flex-1">
                    <label class="block text-xs text-radar font-bold mb-1 uppercase tracking-widest">UPDATE AVATAR PHOTO</label>
                    <input type="file" name="photo" class="block w-full text-sm text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-bold file:bg-radar file:text-black hover:file:bg-cyan-400 transition cursor-pointer"/>
                    <p class="text-[10px] text-slate-500 mt-1">*Format: JPG/PNG. Max Size: 2MB.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs text-slate-500 mb-1 font-mono">FULL NAME</label>
                    <input type="text" name="full_name" value="<?= esc($taruna->full_name) ?>" class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-radar focus:outline-none font-bold">
                </div>
                <div>
                    <label class="block text-xs text-slate-500 mb-1 font-mono">NIS (SERVICE NUMBER)</label>
                    <input type="text" name="nis" value="<?= esc($taruna->nis) ?>" class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-radar focus:outline-none font-mono">
                </div>
            </div>

            <div>
                <label class="block text-xs text-slate-500 mb-1 font-mono">ASSIGNED UNIT (CLASS)</label>
                <select name="class_id" class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-radar focus:outline-none">
                    <?php foreach($classes as $c): ?>
                        <option value="<?= $c->id ?>" <?= $taruna->class_id == $c->id ? 'selected' : '' ?>><?= $c->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-xs text-slate-500 mb-1 font-mono">BIO / MOTTO</label>
                <textarea name="bio_motto" rows="3" class="w-full bg-slate-900 border border-slate-600 rounded p-2 text-white focus:border-radar focus:outline-none placeholder-slate-600" placeholder="Tulis motto hidup..."><?= esc($taruna->bio_motto) ?></textarea>
            </div>

            <div class="flex gap-4 pt-4 border-t border-slate-700">
                <button type="submit" class="flex-1 bg-radar text-black font-bold py-3 rounded hover:bg-cyan-400 transition uppercase tracking-widest shadow-[0_0_15px_rgba(0,240,255,0.3)]">
                    SAVE CHANGES
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>