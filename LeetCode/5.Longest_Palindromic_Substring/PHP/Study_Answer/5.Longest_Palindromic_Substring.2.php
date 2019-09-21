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
        $max_str='';
        for ($i = 0; $i < $s_len; $i++) {
            $left = $right = $i;
            $temp_str = '';
            do {
                $temp_str .= $s[$right];
                $right++;
            } while ($right<$s_len && $s[$right] == $s[$left]);
            $i += $right - $left - 1;
            $left--;
            while ($left>=0&&$right<$s_len&&$s[$right]==$s[$left]){
                $temp_str=$s[$left].$temp_str.$s[$right];
                $right++;
                $left--;
            }
            if (strlen($temp_str)>strlen($max_str)){
                $max_str=$temp_str;
            }

            if (strlen($max_str) > (($s_len- $i) * 2)) {    //剩下的长度*2
                break;
            }
        }
    }
}

$s = new Solution();
//echo $s->longestPalindrome("cbbd") . "\n";
//echo $s->longestPalindrome("ccd") . "\n";
//echo $s->longestPalindrome("aaaa") . "\n";
//echo $s->longestPalindrome("adam") . "\n";
echo $s->longestPalindrome("babadada") . "\n";