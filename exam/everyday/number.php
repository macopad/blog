<?php

function addTwoNumber($number1, $number2) {
    $flag = 0;
    $l1 = strlen($number1);
    $l2 = strlen($number2);
    $add = 0;
    $result = "";
    
    if($l1 > $l2) {
        $long = (string)$number1;
        $short = (string)$number2;
        $add = $l1 - $l2;
    } else {
        $long = (string)$number2;
        $short = (string)$number1;
        $add = $l2 - $l1;
    }
    
    for ($i = strlen($long) - 1; $i >= 0; $i--) {
        if($i - $add >= 0 ){
            $temp = (int)$long[$i] + (int)$short[$i - $add] + $flag;
        } else {
            $temp = (int)$long[$i] + $flag;
        }
        
        if($temp > 9) {
            $flag = 1;
            $temp -= 10;
        } else {
            $flag = 0;
        }
        $result .= $temp;
    }
    
    return $result;
}


$number1 = 22708;
$number2 = 4566853;

print_r(addTwoNumber($number1, $number2));

