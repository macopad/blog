<?php

function popsort($list)
{
    $len = count($list);
    if ($len <= 1) {
        return $list;
    }
    
    for ($i = 0; $i < $len - 1; $i ++) {
        for ($j = $i; $j < $len - 1; $j ++) {
            if ($list[$j] > $list[$j + 1]) {
                $temp = $list[$j + 1];
                $list[$j + 1] = $list[$j];
                $list[$j] = $temp;
            }
        }
    }
    return $list;
}

$list = array(
    898,
    3,
    4,
    5,
    777,
    88,
    9,
    324,
    99
);

$result = popsort($list);
print_r($result);
