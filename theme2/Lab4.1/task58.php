<?php
$str = 'aAXa aeffa aGha aza ax23a a3sSa';

preg_match_all('/a[a-zA-Z]+a/', $str, $matches);

print_r($matches[0]);
?>