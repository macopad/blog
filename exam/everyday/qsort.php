<?php 
error_reporting(2048);

/**
 * 快速排序
 * @param array $input
 */
function qqsort($input) {
    
    $len = count($input);
    
    if($len <= 1) {
        return $input;
    }
    
    $middle = $input[0];
    $left_array = array();
    $right_array = array();
    
    
    for ($i = 1; $i < $len; $i++) {
        if($input[$i] < $middle) {
            $left_array[] = $input[$i];
        } else {
            $right_array[] = $input[$i];
        }
    }
    
    if(count($left_array) > 0) {
        $left_array = qqsort($left_array);
    }
    
    $left_array[] = $middle;
    
    if(count($right_array) > 0) {
        $right_array = qqsort($right_array);
    }
    
    return array_merge($left_array, $right_array);
}

/**
 * 归并排序
 * @param array $input
 */
function mergeSort($input = array()) {
    
}


/**
 * 冒泡排序
 * @param array $input
 * 主要核心思想为，每次把左边跟右边的调换一下顺序，然后冒到最顶端
 */
function popSort($input = array()) {
    $len = count($input);
    for ($i = 0; $i < $len; $i++) {
        for ($j = 0; $j < $len - 1 - $i; $j++ ) {
            if($input[$j] > $input[$j + 1]) {
                $temp = $input[$j + 1];
                $input[$j + 1] = $input[$j];
                $input[$j] = $temp;
            }
        }
    }
    return $input;
}

/**
 * 选择排序
 */
function selectSort() {
    
}

/**
 * 最长子串 双指针计算
 * 时间复杂度为n2
 */
function longStr($str) {
    $maxLen = 0;
    $len = strlen($str);
    echo "strlen is :" . $len . "\n";
    for ($i = 0; $i < $len; $i++) {
        //临时变量，每次保存
        $temp = array();
        $temp[$str[$i]] = $str[$i];
        for ($j = $i + 1; $j < $len; $j++) {
            if(isset($temp[$str[$j]])) {
                echo "str is:" . print_r($temp) . "\n";
                $j = $len - 1;
            } else {
                $temp[$str[$j]] = $str[$j];
            }
        }
        if(count($temp) > $maxLen) {
            $maxLen = count($temp);
        }
    }
    return $maxLen;
}

//字符串翻转
function strTransfer($str, $k) {
    //echo $str;exit;
    $old = "";
    $new = "";
    $len = strlen($str);
    
    for ($i = $len - 1; $i >= 0; $i--) {
        if($i > $len - $k - 1) {
            $new .= $str[$i];
        } else {
            $old .= $str[$i];
        }
    }
    $out = $old . $new;
    return $out;
}

/**
 * 最大回文数，时间复杂度为n2
 * @param unknown $str
 * @return number
 */
function doubleTransfer($str) {
    $len = strlen($str);
    $maxLen = 0;
    $maxStr = "";
    
    for ($i = 0; $i < $len; $i++) {
        $tempLen = 0;
        $temp = $str[$i];
        for ($j = 0 ; $i + $j < $len && $i - $j >= 0 ; $j++) {
            if($i - $j >= 0 && $str[$i - $j] == $str[$i + $j]) {
                $tempLen++;
                $temp = $str[$i - $j] . $temp . $str[$i + $j];
            } else {
                $j = $len;
            }
        }
        $tempLen;//add self
        if ($tempLen > $maxLen) {
            $maxLen = $tempLen;
            $maxStr = $temp;
        }
    }
    //echo $maxStr;
    return $maxLen * 2 + 1;
}


/**
 * action
 */
//$input = array(34,3,6,7,8,99,111,234,999,546,2,33,46,3532,9982,54);
//$pop = popSort($input);
//print_r($pop);

//$qsort = qqsort($input);
//print_r($qsort);


//$str = "abcwetdkfsjdsk";
//echo $str . "\n";
//echo "maxlen is: " . longStr($str) . "\n";

//$str = "123456789";
//echo strTransfer($str, 5);

//$str = "aabaacdefedc";
//$ret = doubleTransfer($str);
//print_r($ret);






