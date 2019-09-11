<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        //假想.理论上最长的字符串应该包含最多的不重复字符  abccabcxyz  最长的就是abcxyz, 不知道可不可以通过某些字符开始查找
        //有一个临时字符串,使用循环,每次新字符就加入.hi到没有新的.
        //如果没有新的字符,就跳过.直到碰到新的字符.但是可能出现重复的字符     abcccccccxabc

        $max = 0;
        $length = strlen($s);
        if ($length < 2) {
            return $length;
        }
        for ($i = 0; $i < $length; $i++) {
            $str = '';
            for ($j = $i; $j < $length; $j++) {
                if (strpos($str, $s[$j]) === false) {//不在临时字符串中
                    $str .= $s[$j];
                } else {
                    $max = strlen($str) > $max ? strlen($str) : $max;     //子字符串存在重复的.
                    $str = '';
                }
            }
            $max = strlen($str) > $max ? strlen($str) : $max;
            if ($max==$length){
                break;
            }
        }
        return $max;
    }
}

$s = new Solution();
//$s->lengthOfLongestSubstring("pwwkew");
//$s->lengthOfLongestSubstring(" ");
$s->lengthOfLongestSubstring("au");