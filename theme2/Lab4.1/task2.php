<?php
$url = "https://site.ru";

if (preg_match('/^https?:\/\/[a-z0-9\-_]+\.[a-z]{2,}$/i', $url)) {
    echo "Строка является валидным доменом с http/https.";
} else {
    echo "Строка НЕ является валидным доменом.";
}
?>