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
        echo "item bin data:";  var_dump(decbin($item));
        echo "merge data:"; $result = $item | $result << 8;
        var_dump(decbin($result));
    }
    return $result;
}

function int2ip($int) {
    $first = ($int >> 24) & 0xff;
    $second = ($int >> 16) & 0xff;
    $third = ($int >> 8) & 0xff;
    $forth = ($int >> 0) & 0xff;
    return $first . "." . $second . "." . $third . "." . $forth;
}

$ip = "101.7.19.222";
$ret = ip2int($ip);
var_dump($ret);

var_dump(int2ip($ret));