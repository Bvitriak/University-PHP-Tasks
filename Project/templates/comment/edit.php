<div class="container mt-4">
    <h2>Редактирование комментария</h2>

    <form action="<?= BASE_URL ?>/comment/<?= $comment->getId() ?>/update" method="POST">
        <div class="mb-3">
            <textarea class="form-control" name="text" rows="5" required><?=
                htmlspecialchars($comment->getText())
                ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="<?= BASE_URL ?>/article/<?= $comment->getArticleId() ?>" class="btn btn-secondary">Отмена</a>
    </form>
</div>