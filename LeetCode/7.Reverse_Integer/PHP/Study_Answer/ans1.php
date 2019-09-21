<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $y=(int)strrev(abs($x));
        if ($y >= 2147483647) {
            return 0;
        }
        return (int)(($x<0?'-':'').$y);
    }
}