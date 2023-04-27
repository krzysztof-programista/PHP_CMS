
<!-- pobieramy adres url bieżącej strony, REQUEST_URI" zabiera query string,strtok pozbawia query stringa (do '?' zapytania w tym przypadku) -->
<?php $base = strtok($_SERVER["REQUEST_URI"], '?'); ?>

<nav>
    <ul class="pagination">
        <li class="page-item">
            <?php if ($paginator->previous): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->previous; ?>">Previous</a>
            <?php else: ?>
                <span class="page-link">Previous</span>
            <?php endif; ?>
        </li>
        <li class="page-item">
            <?php if ($paginator->next): ?>
                <a class="page-link" href="<?= $base; ?>?page=<?= $paginator->next; ?>">Next</a>
            <?php else: ?>
                <span class="page-link">Next</span>
            <?php endif; ?>
        </li>
    </ul>
</nav>
