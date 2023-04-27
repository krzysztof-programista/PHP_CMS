<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

/*null coalescing operator - do dzielenia na strony*/
$paginator = new Paginator($_GET['page'] ?? 1, 6, Article::getTotal($conn));


/*pobieramy wszystkie artykuły z bazy*/
$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);


?>
<?php require '../includes/header.php'; ?>

<h2>Administration</h2>

<a href="new-article.php">New article</a>

<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Published</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article) : ?>
                <tr>
                    <td>
                        <a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a>
                    </td>
                    <td>
                        <?php if ($article['published_at']) : ?>
                            <time><?= $article['published_at'] ?></time>
                        <?php else : ?>
                            Unpublished

                            <button class="publish" data-id="<?= $article['id'] ?>">Publish</button>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php require '../includes/pagination.php'; ?>

<?php endif; ?>

<?php require '../includes/footer.php'; ?>