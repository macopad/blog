<?php

function ip2int($string) {
    $result = 0;
    
    //total match 4 items
    $exp = explode(".", $string);
    if(count($exp) != 4) {
        return false;
    }
    
    //every item between 0-255
    foreach ($exp as $item) {
        if($item >= 0 && $item <= 255) {
            continue;
        } else {
            return false;
        }
    }
    
    //string 2 int
    foreach ($exp as $item) {
        var_dump($item);
        $result = $item | $result << 8;
        var_dump(decbin($result));
    }
    return $result;
}

function int2ip($int) {
    $first = ($int >> 24) & 0xff;
    var_dump($first);
    return $first;
}

$ip = "101.1.1.222";
$ret = ip2int($ip);
var_dump($ret);

var_dump(int2ip($ret));