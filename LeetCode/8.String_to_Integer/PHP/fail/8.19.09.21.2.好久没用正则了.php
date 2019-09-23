<?php

class Solution
{

    /**
     * @param String $str
     * @return Integer
     */
    //这个题目也是,对PHP非常友好啊.
    //感觉使用正则应该会更快.
    function myAtoi($str)
    {
        $regex='/.*([\-|\+]?\d+).*/';
        preg_match_all($regex,$str,$arr);
        var_dump($arr);
    }
}

$s = new Solution();
$s->myAtoi('x42')."\n";
 $s->myAtoi('.1') . "\n";

