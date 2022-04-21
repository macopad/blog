<?php 


function intreverse($x) {

    $ret = 0;
    while($x != 0) {
        $tmp = $x%10;
        $ret = $ret*10 + $tmp;
        $x = (int)($x/10);
    }
    if($ret < -2147483648  || $ret > 2147483647) {
        return 0;
    }
    
    echo PHP_INT_MAX . "\n";
    
    return $ret;
}


$x = 1534236469;
$ret = intreverse($x);
print_r($ret);