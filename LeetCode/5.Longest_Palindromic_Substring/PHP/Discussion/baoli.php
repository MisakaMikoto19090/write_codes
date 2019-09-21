<?php
/****************  暴力解法  ****************/
class Solution {
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len = strlen($s);
        if($len < 2) return $s;         //初始化判断
        $max = $s[0];
        for($i=0;$i<$len;$i++){         //从每一个字符开始，截取到最后一个字符
            for($j=$i+1;$j<$len;++$j){
                $str = substr($s, $i,$j-$i+1);  //正向字符串
                $restr = strrev($str);          //反向字符串
                if($str == $restr && strlen($str) > strlen($max)){
                    $max = $str;        //比较是否是回文串，且比当前最大的子串长
                }
            }
        }
        return $max;
    }
}


