<?php

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

