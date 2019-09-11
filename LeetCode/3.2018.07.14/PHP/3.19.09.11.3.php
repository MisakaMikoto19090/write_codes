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
        $s_length = strlen($s);
        if ($s_length < 2) {
            return $s_length;
        }
        $max = 0;
        $temp_str = $s[0];
        $possible_str = '';
        for ($i = 1; $i < $s_length; $i++) {//减少一次循环
            if (strpos($temp_str, $s[$i]) === false) {
                //之前完全没有出现过
                $temp_str .= $s[$i];
                $possible_str = $temp_str;
            } else {
                //出现过
                $first = strpos($temp_str, $s[$i]);
                $temp_str = substr($temp_str, ($first + 1));
                $temp_str .= $s[$i];
            }
            strlen($temp_str) > $max ? $max = strlen($temp_str) : null;
        }
        //应该是还可以优化的.要不然 abcabcabc,就得一直循环到字符串结束.
        return $max;
    }
}

$s = new Solution();
echo $s->lengthOfLongestSubstring("pwwkew");
//$s->lengthOfLongestSubstring("bwf");
//echo $s->lengthOfLongestSubstring("abcabcbb");
//echo $s->lengthOfLongestSubstring("ckilbkd");
echo $s->lengthOfLongestSubstring("epfvryouvrlbaoogoblwwamyrmgeexvjnagebuyynjzoznwnqjln");  //xvjnagebuy

//$s->lengthOfLongestSubstring("au");