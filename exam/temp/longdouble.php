<?php

function longdouble($str) {
    $max = "";
    $len = strlen($str);
    
    for ($i = 0;$i < $len - 1; $i++) {
        if($str[$i] == $str[$i+1]) {
            $left = $i;
            $right = $i + 1;
            $temp = $str[$i] . $str[$i + 1];
        } else {
            $left = $right = $i;
            $temp = $str[$i];
        }
        
        while ($left > 1 && $right < $len - 1) {
            $left--;$right++;
            if ($str[$left] == $str[$right]) {
                $temp = $str[$left] . $temp . $str[$right];
            } else {
                //stop
                $j = 0;
                $k = $len;
            }
        }
        if(strlen($temp) > strlen($max)) {
            $max = $temp;
        }
    }
    return $max;
}

$str = "adskjsbbsjfsdfksjfls";
$result = longdouble($str);
print_r($result);