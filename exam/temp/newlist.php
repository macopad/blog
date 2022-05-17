<?php 


class Node {
    public $val = 0;
    public $next = null;
    function __construct($val = null, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function addNode(&$head, $node) {
    //初始化node
    if($head->val == null) {
        $head = $node;
    } else {
        $p = $head;
        while ($p->next != null) {
            $p = $p->next;
        }
        $p->next = $node;
    }
}

function getTotal($head) {
    $p = $head;
    $data = array();
    
    //init first one
    if($p->val != null) {
        $data[] = $p->val;
    }
    while ($p->next != null) {
        $p = $p->next;
        $data[] = $p->val;
    }
    return $data;
}

//reverse
function reverse(&$head) {
    $pre = $head;
    $cur = $head;
    $next = null;
    
    while ($cur->next != null) {
         //先保存next到临时变量
         $next = $cur->next;
         //把当前的指针指向反方向节点
         $cur->next = $pre;
         //把新的链表指向当前节点
         $pre = $cur;
         //把当前节点移到下一个节点
         $cur = $next;
    }
    
    //补一下上面的节点遗漏的
    $cur->next = $pre;
    $pre = $cur;
    
    //把根节点置空
    $head->next = null;
    $head = $pre;
}

function deleteK($head, $k) {
    $i = 0;
    $p = $head;
    while ($p->next != null) {
        if($i == $k - 2) {
            $p->next = $p->next->next;
            return;
        }
        $p = $p->next;
        $i++;
    }
}

function deleteLastk(&$head, $k) {
    $i = 0;
    $fast = $normal = $head;
    
    for ($i = 0; $i < $k; $i++) {
        $fast = $fast->next;
    }
    
    while ($fast->next != null) {
        $fast = $fast->next;
        $normal = $normal->next;
    }
    $normal->next = $normal->next->next;
}


//$array = array(1,2,3,4,5,6,7,8,9,10);
//$head = new Node();

//foreach ($array as $item) {
    //echo "add node:" . $item . "\n";
    //addNode($head, new Node($item, null));
//}

//print_r(getTotal($head));
//delete first n
//deleteK($head, 4);
//print_r(getTotal($head));

//delete last n
//deleteLastk($head, 3);

//reverse($head);
//print_r(getTotal($head));

















