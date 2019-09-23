<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        if ($x < 0 || ($x % 10 == 0 && $x > 0)) {
            return false;
        }
        if ($x < 10) {
            return true;
        }
        //这里剩下的就是>10的,
        $y = 0;
        while ($x > $y) {
            $y = $y * 10 + $x % 10;
            if ($x == $y) {//121 奇数位的.增加一个判断.
                break;
            }
            $x = intval($x / 10);
        }
        return $x == $y;
    }
}

$s = new Solution();
var_dump($s->isPalindrome(121));