<?php

function quicksort($list)
{
    $mid = $list[0];
    $left_array = array();
    $right_array = array();
    $len = count($list);
    
    if ($len <= 1) {
        return $list;
    }
    
    for ($i = 1; $i < $len; $i ++) {
        if ($list[$i] < $mid) {
            $left_array[] = $list[$i];
        } else {
            $right_array[] = $list[$i];
        }
    }
    
    if (count($left_array) > 0) {
        $left_array = quicksort($left_array);
    }
    $left_array[] = $mid;
    if (count($right_array) > 0) {
        $right_array = quicksort($right_array);
    }
    
    return array_merge($left_array, $right_array);
}

$list = array(
    5,
    4,
    2,
    555,
    66,
    77,
    868,
    657,
    47474,
    744,
    464,
    6,
    647,
    7546,
    55
);

$result = quicksort($list);

print_r($result);




