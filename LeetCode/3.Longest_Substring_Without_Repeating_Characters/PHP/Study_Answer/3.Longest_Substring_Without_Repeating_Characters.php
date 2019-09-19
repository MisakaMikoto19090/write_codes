<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $s_length = strlen($s);
        $offset = 0;
        $max_length = 0;
        $length = 0;
        for ($i = 0; $i < $s_length; $i++) {
            $pos = strpos($s, $s[$i], $offset);
            if (is_numeric($pos) && $pos < $i) {//存在重复的,并且第一次出现的位置小于当前位置.
                $length = $i - $pos;    //$i是当前位置 abca  3-0-1
                $offset = $pos + 1;         //这里不太好想.从重复位置的下一位开始
            } else {
                //这里不太好想.
                $length += 1;
            }
            $length > $max_length ? $max_length = $length : null;
        }
        return $max_length;
    }
}

$k = new Solution();
echo $k->lengthOfLongestSubstring("abcabcbb") . "\n";
echo $k->lengthOfLongestSubstring("pwwkew") . "\n";
$res = $k->lengthOfLongestSubstring("bwf") . "\n";

echo $res;