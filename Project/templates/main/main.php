<div class="article-table-container">
    <div class="article-table-header">
        <h2 class="article-table-title">Contemporary articles</h2>
        <a href="<?= BASE_URL ?>/article/create" class="new-article-btn">
            <i class="bi bi-plus-lg"></i> New article
        </a>
    </div>

    <table class="article-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Author</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($articles as $article): ?>
            <tr>
                <td class="article-id"><?= $article->getId() ?></td>
                <td>
                    <a href="/article/<?= $article->getId() ?>" class="article-title-link">
                        <?= htmlspecialchars($article->getName()) ?>
                    </a>
                </td>
                <td class="article-excerpt"><?= htmlspecialchars(substr($article->getText(), 0, 120)) ?>...</td>
                <td>
                    <div class="article-author">
                        <div class="author-avatar">
                            <?= strtoupper(substr($article->getAuthorId()->getNickname(), 0, 1)) ?>
                        </div>
                        <span><?= htmlspecialchars($article->getAuthorId()->getNickname()) ?></span>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>