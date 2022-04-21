<?php


function test() {
    $data = 7;
    $hex = decbin($data);
    var_dump($hex);//111
    
    echo "************************\n";
    
    $data2 = "11001";
    $bin = bindec($data2);
    var_dump($bin);//25
    echo "************************\n";
    
    //$data3 = $bin>>2; //00110
    //var_dump($data3);
    //$bin = bindec($data3);
    //var_dump($bin);
    
    $data4 = $bin<<2;
    var_dump(decbin($data4));
    var_dump($data4);
}


function myencode($data) {
    $bindata = decbin($data);
    $flag = true;
    $result = "";
    while ($flag == true) {
        $temp = $data >> 7;
    }
}

function mydecode($data) {
    
}

$data = "1234567890";
$result = myencode($data);
echo strlen($result);
var_dump($result);
