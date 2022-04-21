<?php

function binsearch($list, $key) {
    $len = count($list);

    $low = 0;
    $hight = $len - 1;

    while($low <= $hight) {
        $mid = ceil(($low + $hight)/2);

	if($key < $list[$mid]) {
	    $hight = $mid - 1; 
	} elseif($key > $list[$mid]) {
	    $low = $mid + 1;
	} else {
	    return $mid;
	}
    }
    return -1;

}




$list = array(1,2,3,4,5,6,7,8,9,90,890,999);
$key = 90;
$result = binsearch($list, $key);
print_r($result);
