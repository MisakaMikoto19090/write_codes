<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $size = strlen($s);
        $max = 0;
        $dict = array();
        for ($i = 0, $start = 0, $max = 0; $i < $size; $i++) {
            $char = $s[$i];//某位置的字符
            if (isset($dict[$char]) && $dict[$char] >= $start) {
                //以该字符为key的数组   并且 该字符对应的位置比开始位置大
                $count = $i - $dict[$char];         //求长度
                if ($count > $max) $max = $count;
                $start = $dict[$char] + 1;      //开始位置就是第一个重复字符的后一位.
            } else {
                $count = ($i + 1) - $start;         //如果不存在,说明,
                if ($count > $max) $max = $count;
            }
            $dict[$char] = $i;
        }

        return $max;
    }
    //由于也是找不重复的.思路也是有点像array_flip.以字符为key,字符在字符串中的位置为值.如果存在则说明字符重复了.
}

$k = new Solution();
$k->lengthOfLongestSubstring("abcabcbb");