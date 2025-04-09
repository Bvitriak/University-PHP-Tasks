<?php
$str = "aabb ccdd xxyy zz";

$result = preg_replace('/([a-zA-Z])(?=\1)/', '!', $str);

echo $result;
?>