<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $i      = 0;
        $flag   = 0;
        $length = 0;
        $result = 0;

        $s_length = strlen($s);
        //这个答案的核心,是以当前字符位置(已重复的)来计算.
        //我那个没有思路的是 计算后面的.所以出问题
        //这个思路更好

        while ($i < $s_length) {
            $pos = strpos($s, $s{$i}, $flag);
            if ($pos < $i) {    //有重复的字符
                if ($length > $result) {
                    $result = $length;
                }
//                if ($result >= $s_length - $pos - 1) {      //这里和我的思路一致,如果长度大于剩下长度,可以直接返回.//这里写的不太好理解
                if ($result >= $s_length -1- $pos ) {   //结果大于剩下的长度.
                    return $result;
                }
                $length = $i - $pos - 1;    //计算长度,这里的$i是第二个重复的字符,$pos是第一个
                $flag = $pos + 1;
            }

            $i ++;
            $length ++;
        }
        return $length;
    }
}

$k = new Solution();
$k->lengthOfLongestSubstring("abcabcbb");