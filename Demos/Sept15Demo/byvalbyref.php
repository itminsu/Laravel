<?php

$myNumber = 0;

function myByVal($someNumber)
{
    for($i=0; $i<5; $i++)
    {
        echo "$someNumber </br>";
        $someNumber++;
    }
}

function myByRef(&$someNumber)
{
    for($i=0; $i<5; $i++)
    {
        echo "$someNumber </br>";
        $someNumber++;
    }
}

//myByVal($myNumber);
myByRef($myNumber);

echo "Original is $myNumber";