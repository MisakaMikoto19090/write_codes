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

        while ($i < $s_length) {
            $pos = strpos($s, $s{$i}, $flag);
            if ($pos < $i) {
                if ($length > $result) {
                    $result = $length;
                }
                if ($result >= $s_length - $pos - 1) {
                    return $result;
                }
                $length = $i - $pos - 1;
                $flag = $pos + 1;
            }

            $i ++;
            $length ++;
        }
        return $length;
    }
}