<?php

$myVariable = "Test123";

function myFunction() {

    global $myVariable;
    echo "The global value is $myVariable";

}

function anotherFunction() {
    $myVariable = "New value";
    echo "Another value is $myVariable";

}

myFunction();
//anotherFunction();

?>
