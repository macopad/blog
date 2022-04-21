<?php

function transfer($str, $key) {
    $len = strlen($str);
    $left = "";
    $right = "";
    $list = array();
    
    for($i = 0; $i < $len; $i++) {
        if($i < $key) {
            array_push($list, $str[$i]);
        } else {
            $right .= $str[$i];
        }
    }
    
    while (!empty($list)) {
        $left .= array_shift($list);
    }
    
    return $right . $left;
    
}

$str = "abcdefgh";
$key = 3;

$result = transfer($str, $key);
print_r($result);