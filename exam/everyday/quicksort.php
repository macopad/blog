<?php 

function quicksort($list) {
    $len = count($list);
    $mid = $list[0];
    $left = array();
    $right = array();

    if($len <= 1) {
        return $list;
    }
    
    for ($i = 1; $i < $len; $i++) {
        if($list[$i] < $mid) {
            $left[] = $list[$i];
        } else {
	    $right[] = $list[$i];
        }
    }
    
    if(count($left) > 0) { 
        $left = quicksort($left);
    }
    $left[] = $mid;
    if(count($right) > 0) {
        $right = quicksort($right);
    }
    return array_merge($left, $right);
}

$list = array("3","2","5","5","1","5","6","4");

$ret = quicksort($list);
$len = count($ret);

$k = 2;
$temp = $ret[$len - $k];
$result[] = $temp;
$i = $j = $len - $k;
while($i > 0 || $j < $len - 1) {
    $i--;
    if($i > 0) {
        if($ret[$i] == $temp) {
            $result[] = $ret[$i];
        }
    }

    $j++;
    if($j < $len - 1) {
       if($ret[$j] == $temp) {
            $result[] = $ret[$j];
       } 
    }
}


print_r($result);

