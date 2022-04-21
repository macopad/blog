<?php 

function mypow($x, $n) {
    $result = 0;
    if($n == 0) {
        return 1;
    }
    
    if($n < 0) {
        $x = 1/$x;
        $n = -$n;
    }
    return powex($x, $n);
    
}

function powex($x, $n) {
    if($n == 0) {
        return 1;
    }
    
    $r = powex($x, $n/2);
    if($n%2 == 0) {
        return $r*$r;
    } else {
        return $x * $r * $r;
    }
}

$x=2;
$n=-6;

print_r(mypow($x, $n));