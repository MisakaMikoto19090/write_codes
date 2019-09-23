<?php
class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    //这个显然没有第一个答案好.不过这个正则可以
    function myAtoi($str) {
        $INT_MAX_32 = 2147483647;
        $INT_MIN_32 = -2147483648;

        preg_match('/^\s*([-+]?)(\d+)/', $str, $matches);
        if (empty($matches)) {
            return 0;
        }

        $sign = $matches[1];
        $value = intval($matches[2]);
        if ($sign == '-') {
            $value *= -1;
        }

        return min(max($value, $INT_MIN_32), $INT_MAX_32);
    }
}