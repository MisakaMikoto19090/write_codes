<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        //感觉正确的思路.abcabcd
        //应该是从第一个字符开始,把不同的字符加进临时字符中.直到出现重复(后)的字符.把临时字符中从头开始到重复字符(前)全部去掉.然后继续累积.

        //上一个实现太丑陋了.而且不好理解.
        $s_length = strlen($s);
        if ($s_length < 2) {
            return $s_length;//返回0,1,
        }
        $max = 1;
        $temp_str = $s[0];
        $possible_str = $temp_str;
        for ($i = 1; $i < $s_length; $i++) {//减少一次循环
            if (strpos($possible_str, $s[$i]) === false) {
                //如果是从未出现的全新字符,对于临时字符来说也肯定是全新的
                $possible_str .= $s[$i];
                $temp_str .= $s[$i];
                //出现新字符,统计一下
            } else {
                //以前出现过的字符.这里就需要对字符串做处理了.刚进入,不需要统计
                //abcabc....
                //abcc...
                //aabbccdd($i在这里)eabc
                $temp_str .= $s[$i];
                $pos = strpos($temp_str, $s[$i]);
                if (is_numeric($pos) && $pos < (strlen($temp_str) - 1)) {
                    $temp_str = substr($temp_str, $pos + 1);
                }
            }
            strlen($temp_str) > $max ? $max = strlen($temp_str) : null;
        }
        return $max;
    }
}

$s = new Solution();
echo $s->lengthOfLongestSubstring("pwwkew");//3
echo $s->lengthOfLongestSubstring("bwf");//3
echo $s->lengthOfLongestSubstring("au");  //2
echo $s->lengthOfLongestSubstring("abcabcbb");//3
echo $s->lengthOfLongestSubstring("ckilbkd");//5
echo $s->lengthOfLongestSubstring("bbbbb");//8
echo $s->lengthOfLongestSubstring("alouzxilkaxkufsu");//8
echo $s->lengthOfLongestSubstring("epfvryouvrlbaoogoblwwamyrmgeexvjnagebuyynjzoznwnqjln");  //xvjnagebuy    //10
//epfvryouvr lbaoogoblw wamyrmgeex vjnagebuyy njzoznwnqj ln
