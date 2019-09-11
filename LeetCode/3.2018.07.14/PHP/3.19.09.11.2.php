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
        //应该是从第一个字符开始,把不同的字符加进临时字符红.直到出现重复(后)的字符.把临时字符中从头开始到重复字符(前)全部去掉.然后继续累积.
        $s_length = strlen($s);
        if ($s_length < 2) {
            return $s_length;
        }
        $temp_str=$s[0];
        for ($i = 1; $i < $s_length; $i++) {//减少一次循环
            if (strpos($temp_str,$s[$i])===false){
                //之前完全没有出现过
                $temp_str.=$s[$i];
            }else{
                //出现过
                $first=strpos($temp_str,$s[$i]);
                $temp_str=substr($temp_str,($first+1));
                $temp_str.=$s[$i];

            }


        }
    }
}

$s = new Solution();
//$s->lengthOfLongestSubstring("pwwkew");
//$s->lengthOfLongestSubstring("bwf");
//echo $s->lengthOfLongestSubstring("abcabcbb");
//echo $s->lengthOfLongestSubstring("ckilbkd");
echo $s->lengthOfLongestSubstring("epfvryouvrlbaoogoblwwamyrmgeexvjnagebuyynjzoznwnqjln");  //xvjnagebuy

//$s->lengthOfLongestSubstring("au");