<?php 

function jqka($list) {
    $min = 14;
    $max = 0;
    $dict = array();
    $len = count($list);
    
    for($i = 0; $i < $len; $i++) {
        //if 0 continue
        if($list[$i] == 0) {
            continue;
        }
        
        //if exist
        if(isset($dict[$list[$i]])) {
            return false;
        } else {
            $dict[$list[$i]] = $list[$i];
        }
        
        //max
        if($list[$i] > $max) {
            $max = $list[$i];
        }
        
        //min
        if($list[$i] < $min) {
            $min = $list[$i];
        }
    }
    
    //<5 is right
    return $max - $min < 5;
    
}

$str = array(5,4,7,0,9);
$result = jqka($str);
var_dump($result);