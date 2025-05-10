<div class="article-form-container">
    <div class="article-form">
        <h2 class="mb-4">Create New Article</h2>
        <form action="<?= BASE_URL ?>/article/store" method="POST">
        <div class="mb-3">
                <label for="name" class="form-label">Article title</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Text</label>
                <textarea class="form-control" id="text" name="text" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Article</button>
        </form>
    </div>
</div>