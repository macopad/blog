<?php

function longestPalindrome($s) {
    $len = strlen($s);
    $max = "";
    
    if($len == 1) {
        $max = $s;
    }
    if($len == 0) {
        $max = "";
    }
    
    for($i = 0; $i < $len - 1; $i++) {
        $temp = "";
        
        //case1
        if($s[$i] == $s[$i+1]) {
            $j = $i+1;
            $temp = $s[$i] . $s[$j];
            
            $left = $i;
            $right = $j;
            echo "1left,right:{$left},{$right}\n";
            while($left > 0 && $right < $len - 1) {
                $left--;
                $right++;
                if($s[$left] == $s[$right]) {
                    $temp = $s[$left] . $temp . $s[$right];
                } else {
                    $j = $len;
                }
            }
        }
        if(strlen($temp) > strlen($max)) {
            $max = $temp;
        }
        
        //case2
        $j = $i;
        $temp = $s[$i];
        
        $left = $i;
        $right = $j;
        echo "2left,right:{$left},{$right}\n";
        while($left > 0 && $right < $len - 1) {
            $left--;
            $right++;
            if($s[$left] == $s[$right]) {
                $temp = $s[$left] . $temp . $s[$right];
            } else {
                $j = $len;
            }
        }
        if(strlen($temp) > strlen($max)) {
            $max = $temp;
        }
    }
    return $max;
}

$str = "cbbd";
$ret = longestPalindrome($str);
var_dump($ret);



