<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    //5.19.09.19.1的修改版本,通过,但是运行时间居然440ms,51%,内存倒是用的少,打败了100%.
    //但是还是应该追求运行时间,毕竟内存可以花钱买.运行时间慢必须得改代码.
    function longestPalindrome($s)
    {
        //回文字符.
        //原来的思路,有两种回文模式 ...aa... 或者...aba...(一种特殊情况...aaa...)
        //理论上的思路,理论上讲,最长的回文字符串就应该是它本身.从中间字符开始判断.
        $s_len = strlen($s);
        if ($s_len <= 1) {
            return $s;
        }
        $longest_str = $temp_longest_str = $s[0];
        for ($i = 0; $i < $s_len; $i++) {
            $temp_longest_str = '';
            if (isset($s[$i + 1]) && $s[$i] == $s[$i + 1]) {
                //....aa...
                for ($j = $i, $k = $i + 1;
                     $j >= 0 && $k < $s_len;
                     $j--, $k++) {
                    if ($s[$j] == $s[$k]) {//这里可能会有notice
                        $temp_longest_str = substr($s, $j, ($k - $j + 1));
                    }else{
                        break;
                    }
                }
                strlen($temp_longest_str) > strlen($longest_str) ? $longest_str = $temp_longest_str : null;
            }

            if (isset($s[$i + 1]) && isset($s[$i - 1]) && $s[$i + 1] == $s[$i - 1]) {
                //....a?a...
                for ($j = $i - 1, $k = $i + 1; $j >= 0 && $k < $s_len; $j--, $k++) {
                    //这里的条件,不是逗号,是&&.
                    if ($s[$j] == $s[$k]) {
                        $temp_longest_str = substr($s, $j, ($k - $j + 1));
                    }else{
                        break;
                    }
                }
                strlen($temp_longest_str) > strlen($longest_str) ? $longest_str = $temp_longest_str : null;
            }
        }
        strlen($temp_longest_str) > strlen($longest_str) ? $longest_str = $temp_longest_str : null;

        return $longest_str;
    }
}

$s = new Solution();
//echo $s->longestPalindrome("cbbd") . "\n";
//echo $s->longestPalindrome("ccd") . "\n";
//echo $s->longestPalindrome("aaaa") . "\n";
//echo $s->longestPalindrome("adam") . "\n";
echo $s->longestPalindrome("babadada") . "\n";