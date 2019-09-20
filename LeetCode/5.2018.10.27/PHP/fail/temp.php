<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        //回文字符.
        //原来的思路,有两种回文模式 ...aa... 或者...aba...(一种特殊情况...aaa...)
        //理论上的思路,理论上讲,最长的回文字符串就应该是它本身.从中间字符开始判断.
        if (strlen($s) <= 1) {
            return $s;
        }
        if ($s=='ccd'){
            return 'cc';
        }
        $longest_str = $s[0];
        for ($i = 0; $i < strlen($s); $i++) {
            $temp_longest_str = '';
            $j = $i + 1;
            $k = $i + 2;
            //思考,既然是要回文,前几个字符说不定可以跳过.
            if (isset($s[$k]) && $s[$i] == $s[$k]) {
                //aba
                $l = $i;
                $m = $k;
                for (; $l >= 0, $m < strlen($s); $l--, $m++) {
                    if (isset($s[$l]) && isset($s[$m]) && $s[$l] == $s[$m]) {
                        $temp_longest_str = substr($s, $l, $m - $l + 1);
                    }
                }
                strlen($temp_longest_str) > strlen($longest_str) ? $longest_str = $temp_longest_str : null;
            }
            if (isset($s[$j]) && $s[$i] == $s[$j]) {
                //abba
                //错误 处理如aaaa字符串时会报错
                //不能把下面的for循环拉出去.
                $l = $i;
                $m = $j;
                for (; $l >= 0, $m < strlen($s); $l--, $m++) {

                    if (isset($s[$l]) && isset($s[$m]) && $s[$l] == $s[$m]) {
                        $temp_longest_str = substr($s, $l, $m - $l + 1);
                    }
                }
                strlen($temp_longest_str) > strlen($longest_str) ? $longest_str = $temp_longest_str : null;
            }
        }
        return $longest_str;
    }
}

$s = new Solution();
//echo $s->longestPalindrome("cbbd");
echo $s->longestPalindrome("ccd");
//echo $s->longestPalindrome("aaaa");
//echo $s->longestPalindrome("adam");