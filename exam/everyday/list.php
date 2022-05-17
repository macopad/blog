<?php

/**
 * 
 * @param array $list1
 * @param array $list2
 */
function mergeList($list1, $list2) {
    $len1 = count($list1);
    $len2 = count($list2);
    
    $newList = array();
    $i = $j = 0;
    
    while ($i < $len1 || $j < $len2) {
        if($list1[$i] < $list2[$j] && $i < $len1) {
            $newList[$list1[$i]] = $list1[$i];
            $i++;
        } elseif($j < $len2) {
            $newList[$list2[$j]] = $list2[$j];
            $j++;
        }
    }
    return $newList;
}


$list1 = array(1,2,15,17,19,50,99);
$list2 = array(4,8,16,22,55,10001);

print_r(mergeList($list1, $list2));