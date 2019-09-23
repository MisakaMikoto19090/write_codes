<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        //尝试不使用字符串.
        //能不能使用二进制呢.
        //一个思路是,每次除以10,然后组成一个新的数.感觉还是不是很好
        if ($x < 0) {
            //负数不是
            return false;
        } elseif ($x <= 9) {
            //一位数是

            return true;
        } else {
            //123321
            $temp_x = $x;
            $y = 0;
            do {
                $last_num = $temp_x % 10;
                $temp_x = floor($temp_x / 10);
                $y = $y * 10 + $last_num;
            } while ($temp_x >= 1);
            return $y == $x ? true : false;
        }
    }
}

$s = new Solution();
var_dump($s->isPalindrome(121));