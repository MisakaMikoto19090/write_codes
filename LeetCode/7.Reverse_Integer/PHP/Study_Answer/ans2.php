<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $maxint = 2147483647;
        $minint = -2147483648;
        $rev = 0;
        //这个才是最正确.不借助
        while ($x != 0) {
            $pop = $x % 10;
            $x = intval($x/10);
            $rev = $rev * 10 + $pop;
        }
        if ($rev > $maxint || $rev < $minint) return 0;
        return $rev;
    }
}