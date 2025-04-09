<?php
$str = 'aaa bcd xxx efg';

preg_match_all('/(\w)\1+/', $str, $matches);

print_r($matches[0]);
?>