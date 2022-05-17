<?php

/*

$list = array(1,2,3,4,5);
print_r($list);

array_unshift($list, 777);

print_r($list);

$temp = array_pop($list);
echo "temp is:";
print_r($temp);

print_r($list);

array_push($list, 999);

print_r($list);

$temp = array_shift($list);
print_r($temp);
print_r($list);

*/


$a = 11;
var_dump(decbin($a));
//var_dump(decbin($a << 8));
var_dump($a);
$b = 1;
$a = $b | $a << 8;
var_dump(decbin($a));
var_dump($a);

var_dump(($a >> 7) & 0xff );


