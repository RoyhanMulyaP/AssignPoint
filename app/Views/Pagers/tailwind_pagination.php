<?php $pager->setSurroundCount(1); ?>

<nav class="flex space-x-2">

    <!-- PREV -->
    <?php if ($pager->hasPrevious()): ?>
        <a href="<?= $pager->getPrevious() ?>"
           class="w-10 h-10 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 flex items-center justify-center">
            <i class="fas fa-chevron-left"></i>
        </a>
    <?php endif; ?>

    <!-- NUMBER -->
    <?php foreach ($pager->links() as $link): ?>
        <?php if ($link['active']): ?>
            <span class="w-10 h-10 rounded-lg bg-red-600 text-white flex items-center justify-center">
                <?= $link['title'] ?>
            </span>
        <?php else: ?>
            <a href="<?= $link['uri'] ?>"
               class="w-10 h-10 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 flex items-center justify-center">
                <?= $link['title'] ?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- NEXT -->
    <?php if ($pager->hasNext()): ?>
        <a href="<?= $pager->getNext() ?>"
           class="w-10 h-10 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-300 flex items-center justify-center">
            <i class="fas fa-chevron-right"></i>
        </a>
    <?php endif; ?>

</nav>
