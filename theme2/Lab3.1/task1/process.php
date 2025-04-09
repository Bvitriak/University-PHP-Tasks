<?php
function transformText(&$words) {
    foreach ($words as $key => &$word) {
        if ($key % 2 == 1) {
            $word = strtoupper($word);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    $text = $_POST['text'];

    $words = explode(' ', $text);
    transformText($words);
    $transformedText = implode(' ', $words);
    
    echo "<h2>Результат:</h2>";
    echo "<p>$transformedText</p>";
} else {
    echo "<p>Текст не был введён.</p>";
}
?>
