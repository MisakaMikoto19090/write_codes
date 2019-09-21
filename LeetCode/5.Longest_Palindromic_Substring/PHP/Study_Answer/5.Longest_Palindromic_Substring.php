<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $s_len = strlen($s);
        if ($s_len < 2) {
            return $s;
        }
        $new_s = '#' . implode('#', str_split($s)) . '#'; #.....#
        $new_s_len = strlen($new_s);
        $radius = array_fill(0, $new_s_len, 0);
        $center = $max_right = 0;
        $max_str='';
        for ($i = 1; $i < $new_s_len; $i++) {
            if ($i < $max_right) {
                $radius[$i] = min($max_right - $i, $radius[2 * $center - $i]);
            }
            while (($i - $radius[$i] - 1) >= 0 && ($i + $radius[$i] + 1) < $new_s_len && $new_s[$i - $radius[$i] - 1] == $new_s[$i + $radius[$i] + 1]) {
                //去掉notice
                $radius[$i]++;  //当前字符中心的半径
            }
            if ($radius[$i] + $i > $max_right) {//当前位置+半径大于原来的最大位置
                $max_right = $radius[$i] + $i;
                $center = $i;
            }
            if (2 * $radius[$i] + 1 > strlen($max_str)) {
                $max_str = substr($new_s, $i - $radius[$i], 2 * $radius[$i] + 1);
            }
        }
        return str_replace('#', '', $max_str);
    }
}

$s = new Solution();
//echo $s->longestPalindrome("cbbd") . "\n";
//echo $s->longestPalindrome("ccd") . "\n";
//echo $s->longestPalindrome("aaaa") . "\n";
//echo $s->longestPalindrome("adam") . "\n";
echo $s->longestPalindrome("babadada") . "\n";