<?php
$str = 'xbx aca aea abba adca abea';

$result = preg_replace('/\b/', '!', $str);

echo $result;
?>