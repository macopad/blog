<?php 

function Bigmath($x, $y) {
    $result = 0;
    $lenY = strlen($y);
    $lenX = strlen($x);
    $stringx = (string)$x;
    $stringy = (string)$y;
    
    for ($i = $lenY - 1; $i >= 0; $i--) {
        $temp = 0;
        $carry = 0;
        for ($j = $lenX - 1; $j >= 0; $j--) {
            $v = (int)$stringy[$i] * (int)$stringx[$j] + (int)$carry;
            $stringv = (string)$v;
            if($v > 10) {
                $carry = $stringv[0];
                if($temp > 0) {
                    $temp = $stringv[1] . $temp;
                } else {
                    $temp = $stringv[1];
                }
            } else {
                $carry = 0;
                if($temp > 0) {
                    $temp = $stringv[0] . $temp;
                } else {
                    $temp = $stringv[0];
                }
            }
            
            //最后一位补码上去
            if($j == 0 && $carry > 0) {
                $temp = $carry . $temp;
            }
        }
        //补10位数
        $flag = $lenY - $i;
        while($flag > 1) {
                $temp = $temp . "0";
                $flag--;
        }
        $result += (int)$temp;
    }
    return $result;
}

$x = 669242428;
$y = 174248;
$result = 0;
$result = Bigmath($x, $y); 
echo "x:{$x}*{$y}={$result}\n";