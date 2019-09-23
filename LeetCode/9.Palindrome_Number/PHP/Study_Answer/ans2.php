<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x < 0 || ($x % 10 == 0 && $x > 0 ))
        {   //这个判断可以,又省略呢不少
            return false;
        }
        //思路是一样的.这个实现的更好
        $revertedNumber = 0;
        while($x > $revertedNumber)         //牛逼,这样只需要判断一半就行了.而且可以等于1221 122.1(1) 12.21(12)
        {
            $revertedNumber = $x % 10 + $revertedNumber * 10;
            $x = intval($x / 10);   //忘了,intval是直接取整,不需要使用floor
        }

        return $x == $revertedNumber || $x == intval($revertedNumber/10) ;//后面的这个判断了奇数位数的情况
    }
}