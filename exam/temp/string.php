<?php

function searchMax($string)
{
    $maxLen = 0;
    $maxArray = array();
    $len = strlen($string);
    if($len < 1) {
        return $maxArray;
    }
    
    for ($i = 0; $i < $len; $i ++) {
        $dict = array();
        for ($j = $i; $j < $len; $j ++) {
            if (! isset($dict[$string[$j]])) {
                $dict[$string[$j]] = $string[$j];
                if (count($dict) > count($maxArray)) {
                    $maxArray = $dict;
                }
            } else {
                $dict = array();
            }
        }
    }
    return $maxArray;
}

$string = "abcdefkebeekffssskjedlmx";

$result = searchMax($string);

print_r($result);
