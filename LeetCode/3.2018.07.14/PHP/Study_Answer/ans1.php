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
            $char = $s[$i];
            if (isset($dict[$char]) && $dict[$char] >= $start) {
                $count = $i - $dict[$char];
                if ($count > $max) $max = $count;
                $start = $dict[$char] + 1;
            } else {
                $count = ($i + 1) - $start;
                if ($count > $max) $max = $count;
            }
            $dict[$char] = $i;
        }

        return $max;
    }
}

$k = new Solution();
$k->lengthOfLongestSubstring("abcabcbb");