<?php
$str = 'bbb /aaa\ bbb /ccc\\';

$result = preg_replace('/\/.*?\\\\/', '!', $str);

echo $result;
?>