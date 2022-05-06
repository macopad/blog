<?php 

class TreeNode
{

    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{
    private $result = array();

    /**
     * 广度搜索
     * @param Integer[] $preorder            
     * @return TreeNode
     */
    function bstFromPreorder($preorder)
    {
        $result = array();
        $queue = array();
        
        //初始化跟节点
        array_unshift($queue, $preorder);
        
        while(!empty($queue)) {
            $temp = array_pop($queue);
            $result[] = $temp->val;
            
            if($temp->left != null) array_unshift($queue, $temp->left);
            if($temp->right != null) array_unshift($queue, $temp->right);
        }
        return $result;
    }
    
    //deep search
    function dfsPreorder($preorder) {
        $result = array();
        $stack = array();
        array_push($stack, $preorder);
        
        //init node
        while (!empty($stack)) {
            $temp = array_pop($stack);
            $result[] = $temp->val;
            
            if($temp->right != null) array_push($stack, $temp->right);
            if($temp->left != null) array_push($stack, $temp->left);
        }
        return $result;
    }
    
    //前序搜索
    function first($root) {
        if(empty($root)) {
            return null;
        }
        
        array_push($this->result, $root->val);
        $this->first($root->left);
        $this->first($root->right);
    }
    
    //中序搜索
    function middle($root) {
        if(empty($root)) {
            return null;
        }
        
        $this->middle($root->left);
        array_push($this->result, $root->val);
        $this->middle($root->right);
    }
    
    //后序搜索
    function last($root) {
        if(empty($root)) {
            return null;
        }
        
        $this->last($root->left);
        $this->last($root->right);
        array_push($this->result, $root->val);
    }
    
    //非递归搜索先序
    function normalFirstSearch($root) {
        $strck = array();
        
        array_push($strck, $root);
        while (!empty($strck)) {
            $node = array_pop($strck);
            $this->result[] = $node->val;
            
            if($node->right != null) {
                array_push($strck, $node->right);
            }
            
            if($node->left != null) {
                array_push($strck, $node->left);
            }
        }
        
    }
    
    function normalLastSearch($root) {
        $strck = array();
        $out = array();
        array_push($strck, $root);
        
        while (!empty($strck)) {
            $node = array_pop($strck);
            array_push($out, $node);
            
            if($node->left != null) {
                array_push($strck, $node->left);
            }
            if($node->right != null) {
                array_push($strck, $node->right);
            }
        }
        
        while (!empty($out)) {
            $temp = array_pop($out);
            $this->result[] = $temp->val;
        }
    }
    
    function normalMiddleSearch($root) {
        $stack = array();
        $node = $root;
        while (!empty($stack) || $node!= null) {
            while ($node != null) {
                array_push($stack, $node);
                $node = $node->left;
            }
            $node = array_pop($stack);
            $this->result[] = $node->val;
            $node = $node->right;
        }
    }
    
    //get result
    function getResult() {
        return $this->result;
    }
}

$root = new TreeNode();
$node1 = new TreeNode();
$node2 = new TreeNode();
$node3 = new TreeNode();
$node4 = new TreeNode();
$node5 = new TreeNode();
$node6 = new TreeNode();

$root->val = 8;
$node1->val = 5;
$node2->val = 10;
$node3->val = 1;
$node4->val = 7;
$node6->val = 12;

$root->left = $node1;
$root->right = $node2;
$node1->left = $node3;
$node1->right = $node4;
$node2->right = $node6;

$obj = new Solution();
//$result = $obj->bstFromPreorder($root);
//print_r($result);

//$resultdfs = $obj->dfsPreorder($root);
//print_r($resultdfs);

//first
//$obj->first($root);
//$obj->middle($root);
//$obj->last($root);
//$obj->normalFirstSearch($root);
//$obj->normalLastSearch($root);
$obj->normalMiddleSearch($root);
print_r($obj->getResult());


