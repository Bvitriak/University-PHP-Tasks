<?php
$date = '31-12-2014';

$result = preg_replace('/^(\d{2})-(\d{2})-(\d{4})$/', '$3.$2.$1', $date);

echo $result;
?>