<?php
class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    //对啊,不能直接用intval,因为有e,把e替换掉不就行了.真蠢.
    function myAtoi($str) {
        $str = str_replace('e', 'a', trim($str));
        $int = intval($str);
        if($int < -pow(2, 31)) return -pow(2,31);
        if($int > (pow(2, 31) - 1)) return pow(2,31) - 1;
        return $int;
    }
}