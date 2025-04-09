<?php
$str = "2aaa'3'bbb'4'";

$result = preg_replace_callback(
    "/'(\d+)'/",
    function($matches) {
        return "'" . ($matches[1] * 2) . "'";
    },
    $str
);

echo $result;
?>