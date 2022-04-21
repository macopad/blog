<?php 

function pa($num) {
    $result = 0;
    
    if ($num == 1 || $num == 2) {
        $result = $num;
        return $result;
    }
    
    $result = pa($num - 1) + pa($num - 2);
    return $result; 
}

$num = 5;
$result = pa($num);
print_r($result);