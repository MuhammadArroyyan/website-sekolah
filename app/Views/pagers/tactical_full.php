<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation" class="flex justify-center mt-8">
    <ul class="flex items-center space-x-2 bg-slate-900/80 p-2 rounded-lg border border-slate-700 backdrop-blur">
        
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" class="px-3 py-2 border border-slate-600 text-slate-400 hover:text-white hover:border-radar transition rounded text-xs uppercase font-bold font-mono">
                    &laquo; First
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" class="px-3 py-2 border border-slate-600 text-slate-400 hover:text-white hover:border-radar transition rounded text-xs uppercase font-bold font-mono">
                    Prev
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" class="px-3 py-2 border rounded text-xs font-bold font-mono transition <?= $link['active'] ? 'border-radar text-radar bg-radar/10 shadow-[0_0_10px_rgba(6,182,212,0.3)]' : 'border-transparent text-slate-500 hover:text-white hover:bg-slate-800' ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" class="px-3 py-2 border border-slate-600 text-slate-400 hover:text-white hover:border-radar transition rounded text-xs uppercase font-bold font-mono">
                    Next
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" class="px-3 py-2 border border-slate-600 text-slate-400 hover:text-white hover:border-radar transition rounded text-xs uppercase font-bold font-mono">
                    Last &raquo;
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>