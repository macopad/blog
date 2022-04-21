<?php

function twosum($list, $target) {
    $result = array();
    $len = count($list);
    
    for ($i = 0; $i < $len - 1; $i++) {
        for ($j = $i + 1; $j < $len - 1; $j++) {
            if($list[$i] + $list[$j] == $target) {
                $result[] = array($list[$i], $list[$j]);
            }
        }
    }
    return $result;
}

function twosum2($list, $target) {
    $dict = array();
    $len = count($list);
    $result = array();
    
    for ($i = 0; $i < $len; $i++) {
        $dict[$target - $list[$i]] = $list[$i];
    }
    
    for ($i = 0; $i < $len; $i++) {
        if(array_key_exists($list[$i], $dict)) {
            $result[] = array($list[$i], $dict[$list[$i]]);
        }
    }
    return $result;
}


function threesum($list, $target) {
    $result = array();
    $len = count($list);
    for ($i = 0; $i < $len; $i++) {
        $temp = twosum($list, $target - $list[$i]);
        if(count($temp) > 0) {
            //print_r($temp);
            foreach ($temp as $k => $v) {
                $result[] = array_merge($v, array($list[$i]));
            }
        }
    }
    return $result;
}


$list = array(2,4,5,7,9,10,15,33,23,8);
$target = 56;
$result = twosum($list, $target);
print_r($result);

$result = twosum2($list, $target);
print_r($result);

$target = 61;
$result = threesum($list, $target);
print_r($result);