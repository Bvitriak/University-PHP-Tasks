<div class="hello-container">
    <div class="hello-card">
        <h1 class="hello-title">Привет, <?= htmlspecialchars($name ?? 'Гость') ?>!</h1>
        <p class="hello-text">Добро пожаловать на наш сайт. Мы рады видеть вас здесь!</p>
        <a href="<?= BASE_URL ?>/" class="hello-btn">
            <i class="bi bi-house-door"></i> Вернуться на главную
        </a>
    </div>
</div>