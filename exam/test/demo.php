<?php
require_once '../temp/newlist.php';

//二分搜索
function binsearch($list, $key) {
    $count = count($list);
    $left = 0;
    $right = $count -1 ;
    
    while ($left < $right) {
        $mid = ceil(($left + $right) / 2);
        if($list[$mid] == $key) {
            return $mid;
        } elseif($list[$mid] < $key) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    
    return -1;
}
//$list = array(1,2,3,5,6,7,99,104);
//var_dump(binsearch($list, 9));

//快速排序
function quicksort($list) {
    $len = count($list);
    if($len <= 1) {
        return $list;
    }
    
    $mid = $list[0];
    $left = array();
    $right = array();
    for($i = 1; $i < $len; $i++) {
        if($list[$i] < $mid) {
            $left[] = $list[$i];
        } else {
            $right[] = $list[$i];
        }
    }
    
    if(count($left) > 0) {
        $left = quicksort($left);    
    }
    $left[] = $mid;
    if(count($right) > 0) {
        $right = quicksort($right);
    }
    return array_merge($left, $right);
}
//$list = array(3111,1,2,444,555,6353,24,3,5,6,7,99,104);
//print_r(quicksort($list));

function popsort($list) {
    $len = count($list);
    if($len <= 1) {
        return $list;
    }
    
    for($i = 0; $i < $len; $i++) {
        for($j = 0 ; $j < $len - $i - 1; $j++) {
            if($list[$j] > $list[$j + 1]) {
                $temp = $list[$j + 1];
                $list[$j + 1] = $list[$j];
                $list[$j] = $temp;
            }
        }
    }
    return $list;
}
//$list = array(3111,1,2,444,555,6353,24,3,5,6,7,99,104);
//print_r(popsort($list));

//爬楼梯问题
function crimlouti($num) {
    $result = 0;
    
    if($num == 1 || $num == 2) {
        $result = $num;
        return $result;
    }
    
    $result = crimlouti($num - 2) + crimlouti($num - 1);
    return $result;
}
//$num = 20;
//print_r(crimlouti($num));

//判断是否为顺子
function jqka($list) {
    $len = count($list);
    $min = 14;
    $max = 0;
    $dict = array();
    
    for($i = 0; $i < $len; $i++) {
        if($list[$i] == 0) {
            continue;
        }
        
        //重复
        if(isset($dict[$list[$i]])) {
            return -1;
        } else {
            $dict[$list[$i]] = $list[$i];
        }
        
        //大小判断
        if($list[$i] > $max ) {
            $max = $list[$i];
        }
        
        if($list[$i] < $min) {
            $min = $list[$i];
        }
    }
    return $max - $min;
}
//$list = array(2,3,4,5,6);
//print_r(jqka($list));

//ip转换为整数
function ip2int($ip) {
    $list = explode(".", $ip);
    if(count($list) != 4) {
        return -1;
    }
    
    foreach ($list as $item) {
        if($item < 0 || $item > 255) {
            return -1;
        }
    }
    
    $result = 0;
    foreach ($list as $item) {
        $result = $item | $result << 8;
    }
    //测试是否ok
    var_dump(($result >> 24) & 0xff);
    
    return $result;
}
//$ip = "134.21.31.4";
//print_r(ip2int($ip));

//股票最大收益化问题
function stock($stock) {
    $min = PHP_INT_MAX;
    $maxIncome = 0;
    
    $len = count($stock);
    for ($i = 0; $i < $len ; $i++) {
        $curr = (int)$stock[$i];
        if($curr < $min) {
            $min = $curr;
        }
        
        $temp = $curr - $min;
        if($temp > $maxIncome) {
            $maxIncome = $temp;
        }
    }
    return $maxIncome;
}
//$list = array(1,3,4,55,66,77,88,79);
//print_r(stock($list));

//2数相加结果为target,返回数据下标
function twosumTarget($list, $target) {
    $result = array();
    $len = count($list);
    if($len <= 1) {
        return -1;
    }
    
    /*
    for ($i = 0; $i < $len; $i++) {
        for ($j = $i + 1; $j < $len; $j++) {
            if($list[$i] + $list[$j] == $target) {
                $result = array($i, $j);
                return $result;
            }
        }
    }*/
    
    //方法2
    $dict = array();
    for ($i = 0; $i < $len; $i++) {
        $dict[$target - $list[$i]] = $i;
    }
    
    for ($i = 0; $i < $len; $i++) {
        if (isset($dict[$list[$i]])) {
            $result = array($dict[$list[$i]], $i);
            return $result;
        }
    }
    
    return -1;
}
//$list = array(1,2,3,5,6,7,9,11,99);
//$target = 12;
//print_r(twosumTarget($list, $target));

//数字翻转
function intfanzhuan($int) {
    $ret = 0;
    
    while($int != 0) {
        $tmp = $int%10;
        $ret = $ret*10 + $tmp;
        $int = (int)($int/10);
    }
    return $ret;
}
//$num = -12345;
//print_r(intfanzhuan($num));

//最长回文
function maxhuiwen($str) {
    $max = "";
    $len = strlen($str);
    for($i = 0; $i < $len - 1; $i++) {
        if($str[$i] == $str[$i+1]) {
            $left = $i;
            $right = $i+1;
            $temp = $str[$i] . $str[$i+1];
        } else {
            $left = $i;
            $right = $i;
            $temp = $str[$i];
        }
        
        while($left > 0 && $right < $len -1) {
            $left--;
            $right++;
            if($str[$left] == $str[$right]) {
                $temp = $str[$left] . $temp . $str[$right];
            } else {
                $left = 0;
                $right = $len;
            }
        }
        
        //result
        if(strlen($temp) > strlen($max)) {
            $max = $temp;
        }
    }
    return $max;
}
//$str = "adsjflsjfdsflkklfjdss";
//print_r(maxhuiwen($str));

//最大无重复子串
function maxstr($str) {
    $max = "";
    $len = strlen($str);
    
    for($i = 0; $i < $len; $i++) {
        $temp = "";
        $dict = array();
        for ($j = $i; $j < $len; $j++) {
            if(!isset($dict[$str[$j]])) {
                $dict[$str[$j]] = $str[$j];
                $temp .= $str[$j];
            } else {
                $j = $len;
            }
        }
        if(strlen($temp) > strlen($max)) {
            $max = $temp;
        }
    }
    return $max;
}
//$str = "dsfsfsfsdfsfwerwewgewgewgwgwfkjiiewgew";
//print_r(maxstr($str));

//链表反转
function listResverse(&$head) {
    print_r(getTotal($head));
    
    //处理
    $cur = $head;
    $pre = $head;
    $next = null;

    while($cur->next != null) {
        $next = $cur->next;
        $cur->next = $pre;
        $pre = $cur;
        $cur = $next;
    }
    $cur->next = $pre;
    $pre = $cur;
    
    $head->next = null;
    $head = $pre;
    print_r(getTotal($head));
}

/*
$array = array(1,2,3,4,5,6,7,8,9,10);
//初始化链表
$head = new Node();
foreach ($array as $item) {
    //echo "add node:" . $item . "\n";
    addNode($head, new Node($item, null));
}
print_r(listResverse($head));
*/

//大数相加
function bigintadd($x, $y) {
    $lenx = strlen($x);
    $leny = strlen($y);
    
    $max = 0;
    $min = 0;
    if($lenx > $leny) {
        $max = (string)$x;
        $min = (string)$y;
    } else {
        $max = (string)$y;
        $min = (string)$x;
    }
    
    $diff = strlen($max) - strlen($min);
    $result = "";
    $carry = 0;
    for($i = strlen($max) - 1; $i >= 0; $i--) {
        $temp = 0;
        if($i - $diff >= 0) {
            $temp = (int)$max[$i] + (int)$min[$i - $diff] + $carry;
        } else {
            $temp = (int)$max[$i] + $carry;
        }
        
        if($temp > 9) {
            $carry = (int)($temp/10);
            if($result === "") {
                $result = (string)($temp%10);
            } else {
                $result = (string)$temp%10 . $result;
            }
        } else {
            $carry = 0;
            if($result == "") {
                $result = $temp;
            } else {
                $result = $temp . $result;
            }
        }
    }
    
    if($carry > 0) {
        $result = $carry . $result;
    }
    return $result;
}
//$x = "1458493285092592380952386092380953285093285093275093275327502";
//$y = "123456723525233242343243243223432432432325832583205298758175981759817985179843243";
//var_dump(bigintadd($x, $y));

//mypow
function mypow($x, $n) {
    if($x == 0 && $n < 0) {
        return -1;
    }
    
    if($n < 0) {
        $x = 1/$x;
        $n = -$n;
    }
    
    return mypowex($x, $n);
}

function mypowex($x, $n) {
    if($n == 0) {
        return 1;
    }
    
    $result = mypowex($x, $n/2);
    if($n%2 == 0) {
        return $result * $result;
    } else {
        return $result * $result * $x;
    }
}

//$x = 2;$n = -7;
//print_r(mypow($x, $n));


//lru内存算法
function mylru(&$list, $method, $key) {
    $max = 5;
    
    if($method == "get") {
        if(isset($list[$key])) {
            unset($list[$key]);
            $list[$key] = $key;
        }
    }
    
    if($method == "put") {
        if(isset($list[$key])) {
            unset($list[$key]);
            $list[$key] = $key;
        } else {
            if(count($list) == $max) {
                array_shift($list);
                $list[$key] = $key;
            } else {
                $list[$key] = $key;
            }
        }
    }
}

/**
$list = array();
mylru($list, "put", "test1");
mylru($list, "put", "test2");
mylru($list, "put", "test3");
mylru($list, "put", "test4");
mylru($list, "put", "test5");
mylru($list, "put", "test6");
mylru($list, "get", "test4");
print_r($list);*/


//大数相乘
function bigmathxy($x, $y) {
    
}

//合并2个有序数组
function mergeList($list1, $list2) {
    $newlist = array();
    $l1 = count($list1);
    $l2 = count($list2);
    $i = $j = 0;
    
    while ($i < $l1 || $j < $l2) {
        if($list1[$i] < $list2[$j] && $i < $l1) {
            $newlist[] = $list1[$i];
            $i++;
        } elseif($j < $l2) {
            $newlist[] = $list2[$j];
            $j++;
        }
    }
    return $newlist;
}
//$list1 = array(1,2,5,7,9);
//$list2 = array(2,4,6,8,10);
//print_r(mergeList($list1, $list2));

//树的遍历和搜索
function treesearch($tree) {
    
}

//2个栈实现一个队列
function stack2list(&$stack1, &$stack2, $item, $method) {
    //入队列
    if($method == "push") {
        if(!empty($stack2)) {
            while (!empty($stack2)) {
                $temp = array_pop($stack2);
                array_push($stack1, $temp);
            }
        }
        array_push($stack1, $item);
        return true;
    }
    
    //出队列
    if($method == "pop") {
        if(!empty($stack1)) {
           while (!empty($stack1)) {
               $temp = array_pop($stack1);
               array_push($stack2, $temp);
           }
        }
        $temp = array_pop($stack2);
        return $temp;
    }
}

/*
$stack1 = array();
$stack2 = array();
$list = array();
stack2list($stack1, $stack2,"test1", "push");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test2", "push");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test3", "push");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test3", "pop");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test4", "push");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test5", "push");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test3", "pop");
print_r($stack1);print_r($stack2);
stack2list($stack1, $stack2,"test3", "pop");
print_r($stack1);print_r($stack2);
*/

//第三个字符串翻转
function stringfanzhuan($str) {
    
}

//两个数相加
function twonumsaddforptr($x, $y) {
    
}

//容器最多的雨水/接雨水问题
function waterproblem($height = array()) {
    $left = 0;
    $right = count($height) - 1;
    $ans = 0;
    
    $left_max = 0;
    $right_max = 0;
    
    while ($left < $right) {
        if($height[$left] < $height[$right]) {
            ($height[$left] > $left_max)? $left_max = $height[$left] : $ans += $left_max - $height[$left];
            $left++;
        } else {
            ($height[$right] > $right_max) ? $right_max = $height[$right] : $ans += $right_max - $height[$right];
            $right--;
        }
    }
    return $ans;
}
//$height = array(1,2,0,0,0,0,9);
//print_r(waterproblem($height));


//删除链表第N个节点
function deleteListN($list , $num) {
    
}

//翻转链表的N个节点
function resListNode(&$list) {
    
}

//第N个排列
function listnsort($list) {
    
}

//丢失的自然数,比如5,9,-1,3,1.返回2，对于7,4,2,9,5.返回1，对于-1,3,1,2,4,-2 .返回5
function ziranshu($list) {
    $min = 999;
    $len = count($list);
    for($i = 0; $i < $len; $i++) {
        if($list[$i] <= 1) {
            continue;
        }
        
        $temp = $list[$i] - 1;
        if(!in_array($temp, $list)) {
            if($temp < $min) {
                $min = $temp;
            }
        }
        
        $temp = $list[$i] + 1;
        if(!in_array($temp, $list)) {
            if($temp < $min) {
                $min = $temp;
            }
            
        }
    }
    return $min;
}
//$list = array(7,4,2,9,5);
//print_r(ziranshu($list));



