<?php
$str = 'a1a a22a a333a a4444a a55555a aba aca';

preg_match_all('/a\d+a/', $str, $matches);

print_r($matches[0]);
?>