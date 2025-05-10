<div class="hello-container">
    <div class="hello-card">
        <h1 class="hello-title">Hello, <?= htmlspecialchars($name ?? 'Гость') ?>!</h1>
        <p class="hello-text">Welcome to our site. We are glad to see you here!</p>
        <a href="<?= BASE_URL ?>/" class="hello-btn">
            <i class="bi bi-house-door"></i> Back to home
        </a>
    </div>
</div>