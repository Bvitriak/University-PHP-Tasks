<!-- templates/article/show.php -->
<div class="card mb-4">
    <div class="card-body">
        <h1 class="card-title"><?= htmlspecialchars($article->getName()) ?></h1>
        <h6 class="card-subtitle mb-2 text-muted">
            Автор: <?= htmlspecialchars($article->getAuthorId()->getNickname()) ?>
        </h6>
        <p class="card-text"><?= nl2br(htmlspecialchars($article->getText())) ?></p>
    </div>
    <div class="card-footer">
        <a href="<?= BASE_URL ?>/article/<?= $article->getId() ?>/edit" class="btn btn-primary">Редактировать</a>
        <form action="<?= BASE_URL ?>/article/<?= $article->getId() ?>/delete" method="POST" style="display:inline">
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    </div>
</div>

<!-- Форма добавления комментария -->
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Добавить комментарий</h5>
        <form action="<?= BASE_URL ?>/article/<?= $article->getId() ?>/comments" method="POST">
            <div class="mb-3">
                <textarea name="comment_text" class="form-control" rows="3" placeholder="Ваш комментарий..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>

<!-- Список комментариев -->
<?php if (!empty($comments)): ?>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Комментарии</h5>
            <?php foreach ($comments as $comment): ?>
                <div class="card mb-2" id="comment-<?= $comment->getId() ?>">
                    <div class="card-body">
                        <p><?= htmlspecialchars($comment->getText()) ?></p>
                        <small class="text-muted">
                            <?= htmlspecialchars($comment->getAuthorId()->getNickname()) ?>,
                            <?= $comment->getCreatedAt() ?>
                        </small>
                        <div class="mt-2">
                            <a href="<?= BASE_URL ?>/comment/<?= $comment->getId() ?>/edit"
                               class="btn btn-sm btn-outline-primary">Редактировать</a>
                            <form action="<?= BASE_URL ?>/comment/<?= $comment->getId() ?>/delete"
                                  method="POST" style="display:inline">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>