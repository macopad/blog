<?php 

class LRU {
    
    private $max = 5;
    private $dict = array(); //key -> point
    private $list = array(); //key -> value
    
    function put($value) {
        //如果存在这个key
        if(isset($this->dict[$value])) {
            unset($this->list[$this->dict[$value]]);//删除里面的key
            array_push($this->list, array($value => $value));//追加在队列的末尾
        } else {
            //如果不存在这个key,先看容量是否超
            if(count($this->list) < $this->max) {
                $this->dict[$value] = $value;
                $this->list[$value] = $value;
            } else {
                //容量不足了
                $key = array_shift($this->list);
                unset($this->dict[$key]);
                $this->dict[$value] = $value;
                $this->list[$value] = $value;
            }
        }
    }
    
    function get($value) {
        unset($this->list[$this->dict[$value]]);//删除里面的key
        $this->list[$value] = $value;
    }
    
    function showList() {
        //print_r($this->dict);
        print_r($this->list);
    }
}

$obj = new LRU();

//set 1,2,3,4,5,6,7
$arr = array("test1","test2","test3","test4","test5","test6","test7");
foreach ($arr as $value) {
    $obj->put($value);
}
print_r($obj->showList());

$obj->get("test4");
print_r($obj->showList());

$obj->put("test8");
$obj->put("test9");
$obj->put("test19");

print_r($obj->showList());





