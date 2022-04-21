<?php 

function longStr($str) {
    $len = strlen($str);
    $maxStr = "";
    
    if($len <= 1) {
        return $str;
    }
    
    for ($i = 0; $i < $len; $i++) {
        $dict = array();
        $temp = "";
        for ($j = $i; $j < $len; $j++) {
            if(isset($dict[$str[$j]])) {
                if(strlen($temp) > strlen($maxStr)) {
                    $maxStr = $temp;
                }
                $j = $len - 1;
            } else {
                $dict[$str[$j]] = $str[$j];
                $temp .= $str[$j];
            }
        }
    }
    return $maxStr;
}

$str = "abcdeffgk239nmsafeegigklsj";
$result = longStr($str);
print_r($result);