<!-- komentarz_html-->
<?php /*komentarz_php*/ ?>


<?php

/*dołączenie pliku jako wymagany do wczytania*/
require 'includes/init.php';

/*pobieramy "obiekt" $conn*/
$conn = require 'includes/db.php';

/*null coalescing operator*/
$paginator = new Paginator($_GET['page'] ?? 1, 4, Article::getTotal($conn, true));


/*pobieramy wszystkie artykuły z bazy*/
$articles = Article::getPage($conn, $paginator->limit, $paginator->offset, true);


?>

<?php require 'includes/header.php'; ?>

<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>

    <ul id="index">
        <?php foreach ($articles as $article) : ?>
            <li>
                <article>
                    <!-- każdy tytuł jest nowym linkiem z odpowiednio przypisanym id za pomocą query string'a, htmlspecialchars zapobiega wstrzyknięciu kodu z zewnątrz-->
                    <h2><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h2>

                    <time datetime="<?= $article['published_at'] ?>"><?php
                        $datetime = new DateTime($article['published_at']);
                        echo $datetime->format("j F, Y");
                    ?></time>

                    <?php if ($article['category_names']) : ?>
                        <p>Categories:
                            <?php foreach ($article['category_names'] as $name) : ?>
                                <?= htmlspecialchars($name ?? ''); ?>
                            <?php endforeach ?>
                        </p>
                    <?php endif; ?>

                    <p><?= htmlspecialchars($article['content']); ?></p>
                </article>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php require 'includes/pagination.php'; ?>

<?php endif; ?>


<?php require 'includes/footer.php'; ?>