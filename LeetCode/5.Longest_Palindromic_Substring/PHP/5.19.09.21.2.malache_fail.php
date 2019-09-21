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
        $center = $max_right = $r = 0;
        $max_str = '';
        for ($i = 1; $i < $new_s_len; $i++) {
            while (($i - $radius[$i] - 1) >= 0 && ($i + $radius[$i] + 1) < $new_s_len && $new_s[$i - $radius[$i] - 1] == $new_s[$i + $radius[$i] + 1]) {
                $radius[$i]++;  //当前字符中心的半径
            }

            if (2 * $radius[$i] + 1 > strlen($max_str)) {
                $max_str = substr($new_s, $i - $radius[$i], 2 * $radius[$i] + 1);
            }
        }
        $max_str = str_replace('#', '', $max_str);
        return $max_str;
    }
}

$s = new Solution();
//echo $s->longestPalindrome("cbbd") . "\n";
//echo $s->longestPalindrome("ccd") . "\n";
//echo $s->longestPalindrome("aaaa") . "\n";
//echo $s->longestPalindrome("adam") . "\n";
echo $s->longestPalindrome("babadada") . "\n";