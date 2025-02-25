<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат работы get_headers</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.png" alt="МосПолитех">
        </div>
        <div class="title">
            <h1>Результат работы get_headers</h1>
        </div>
    </header>

    <main>
        <textarea id="headersResult" rows="20" cols="80">
            <?php
                $url = 'https://httpbin.org/get';
                $headers = get_headers($url);
                foreach ($headers as $header) {
                    echo htmlspecialchars($header) . "\n";
                }
            ?>
        </textarea>
    </main>

    <footer>
        <p>&copy; 2025 Все права защищены.</p>    
    </footer>
</body>
</html>