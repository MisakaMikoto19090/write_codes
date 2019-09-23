<?php

class Solution
{

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        //彩笔做法,使用字符串
        return $x == strrev($x . '') ? true : false;

    }
}