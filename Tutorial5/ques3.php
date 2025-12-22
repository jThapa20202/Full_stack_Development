<?php
$globalVar = "I am global";

function testfunction(){
    echo $globalVar; //without global variable
}
function testfunction2(){
    global $globalVar;
    echo $globalVar;
}
testfunction();
testfunction2();
