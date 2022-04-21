<?php

class myList{
    
    private $strack1 = array();
    private $strack2 = array();
    
    function put($item) {
        if (count($this->strack2) > 0) {
            $count = count($this->strack2);
            for ($i = 0; $i < $count; $i++) {
                array_push($this->strack1, array_pop($this->strack2));
            }
        }
        array_push($this->strack1, $item);
        return true;
    }
    
    function get() {
        if(count($this->strack2) < 1) {
            //如果这个时候也为空，说明整体list为空
            if(empty($this->strack1)) {
                return -1;
            } else {
                //压入temp队列
                $count = count($this->strack1);
                for ($i = 0; $i < $count; $i++) {
                    array_push($this->strack2, array_pop($this->strack1));
                }
            }
        }
        return array_pop($this->strack2);
    }
    
    function showList() {
        
        print_r($this->strack1);
        
        print_r($this->strack2);
    }
    
}

$list = array("2","get","get","3","4","5","6","get","9","11","get","get","get","get","get","get");
$obj = new myList();
$result = array();
print_r($list);

for ($i = 0; $i < count($list); $i++) {
    //$obj->showList();
    if($list[$i] == "get") {
        $result[] = $obj->get();
    } else {
        $result[] = $obj->put($list[$i]);
    }
    //$obj->showList();
    //echo "*************************************\n";
}

var_dump($result);



