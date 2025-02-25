<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="img/logo.png" alt="МосПолитех">
        </div>
        <div class="title">
            <h1>Форма обратной связи</h1>
        </div>
    </header>

    <main class="main">
        <form action="https://httpbin.org/post" method="POST" class="form-block">
        <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">E-mail пользователя:</label>
            <input type="email" id="email" name="email" required>

            <label for="type">Тип обращения:</label>
            <select id="type" name="type" required>
                <option value="" disabled selected>Выберите тип обращения</option>
                <option value="жалоба">Жалоба</option>
                <option value="предложение">Предложение</option>
                <option value="благодарность">Благодарность</option>
            </select>

            <label for="message">Текст обращения:</label>
            <textarea id="message" name="message" required></textarea>

            <label>Вариант ответа:</label>
            <div class="checkbox-group">
                <label class="checkbox-item">
                    <input type="checkbox" id="sms" name="response_type[]" value="sms">
                    <span class="custom-checkbox"></span>
                    <span>SMS</span>
                </label>
                <label class="checkbox-item">
                    <input type="checkbox" id="email_response" name="response_type[]" value="email">
                    <span class="custom-checkbox"></span>
                    <span>E-mail</span>
                </label>
            </div>
            <div class="form-buttons">
                <button type="submit">Отправить</button>
                <a href="page2.php" class="btn">Перейти на страницу 2</a>
            </div>
        </form>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Все права защищены.</p>    
    </footer>
</body>
</html>