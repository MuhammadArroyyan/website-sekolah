<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex justify-center mt-10 mb-8">
    <ul class="inline-flex items-center bg-slate-900 border border-slate-700 p-1 rounded gap-1 shadow-lg shadow-black/50">
        
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" title="First" class="h-9 px-3 flex items-center justify-center border border-transparent text-slate-500 hover:text-white hover:bg-slate-800 hover:border-slate-600 transition rounded text-[10px] font-bold font-mono uppercase tracking-wider">
                    Start
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" title="Previous" class="w-9 h-9 flex items-center justify-center border border-transparent text-slate-500 hover:text-white hover:bg-slate-800 hover:border-slate-600 transition rounded">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="w-9 h-9 flex items-center justify-center border rounded text-xs font-bold font-mono transition relative group
                    <?= $link['active'] 
                        ? 'border-radar text-radar bg-radar/10 shadow-[0_0_10px_rgba(6,182,212,0.2)] z-10' 
                        : 'border-transparent text-slate-500 hover:text-white hover:bg-slate-800 hover:border-slate-600' 
                    ?>">
                    <?= $link['title'] ?>
                    
                    <?php if($link['active']): ?>
                        <span class="absolute -bottom-1 w-1 h-1 bg-radar rounded-full"></span>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" title="Next" class="w-9 h-9 flex items-center justify-center border border-transparent text-slate-500 hover:text-white hover:bg-slate-800 hover:border-slate-600 transition rounded">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" title="Last" class="h-9 px-3 flex items-center justify-center border border-transparent text-slate-500 hover:text-white hover:bg-slate-800 hover:border-slate-600 transition rounded text-[10px] font-bold font-mono uppercase tracking-wider">
                    End
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>