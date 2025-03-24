<?php

// Задание 1
$str = 'a1b2c3';
$result = preg_replace_callback('/\d/', function($matches) {
    return $matches[0] . $matches[0];
}, $str);

echo $result;

// Задание 2
$url = "https://site.ru";

if (preg_match('/^https?:\/\/[a-z0-9\-_]+\.[a-z]{2,}$/i', $url)) {
    echo "Строка является валидным доменом с http/https.";
} else {
    echo "Строка НЕ является валидным доменом.";
}

// Задание 8
$str = 'aaa bcd xxx efg';

preg_match_all('/(\w)\1+/', $str, $matches);

print_r($matches[0]);

// Задание 13
$str = 'bbb /aaa\ bbb /ccc\\';

$result = preg_replace('/\/.*?\\\\/', '!', $str);

echo $result; 

// Задание 16
$str = 'xbx aca aea abba adca abea';

$result = preg_replace('/\b/', '!', $str);

echo $result;

// Задание 20
$str = "2aaa'3'bbb'4'";

$result = preg_replace_callback(
    "/'(\d+)'/", 
    function($matches) {
        return "'" . ($matches[1] * 2) . "'";
    },
    $str
);

echo $result;

// Задание 23
$str = "aabb ccdd xxyy zz";

$result = preg_replace('/([a-zA-Z])(?=\1)/', '!', $str);

echo $result; 

// Задание 31
$date = '31-12-2014';

$result = preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/', '$3.$2.$1', $date);

echo $result; 

// Задание 45
$str = 'a1a a22a a333a a4444a a55555a aba aca';

preg_match_all('/a\d+a/', $str, $matches);

print_r($matches[0]);

// Задание 58
$str = 'aAXa aeffa aGha aza ax23a a3sSa';

preg_match_all('/a[a-zA-Z]+a/', $str, $matches);

print_r($matches[0]);