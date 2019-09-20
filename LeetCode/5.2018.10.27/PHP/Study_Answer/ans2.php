<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len    = strlen($s);
        $result = '';
        $ret    = '';
        for ($i = 0; $i < $len; $i++) {
            $left  = $i;
            $right = $i;
            $ret   = '';
            while ($right < $len && $s[$left] == $s[$right]) {
                $ret .= $s[$right];
                $right++;
            }
            $i += $right - $left -1;
            $left--;
            while ($left >= 0 && $right < $len && $s[$left] == $s[$right]) {
                $ret = $s[$left] . $ret . $s[$left];
                $left--;
                $right++;
            }
            if (strlen($result) < strlen($ret)) {
                $result = $ret;
            }
            if (strlen($result) > (($len - $i) * 2)) {
                break;
            }
        }
        return $result;
    }
}