<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    //php自带函数.
    function reverse($x)
    {
//        echo PHP_INT_MAX+1;
//        echo "\n";
//        echo pow(2,32);
        if ($x > 0) {
            $positive = true;
        } else {
            $positive = false;
        }
        $x .= '';
        $x = strrev($x);

        $positive ? $x = $x + 0 : $x = -($x + 0);
        if ($x > (pow(2, 31) - 1) || $x < -pow(2, 31)) {
            $x = 0;
        }
        return $x;
    }
}

echo PHP_INT_MAX + 1;
echo "\n";
echo pow(2, 32);