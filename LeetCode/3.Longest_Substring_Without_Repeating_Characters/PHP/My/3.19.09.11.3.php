<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        //感觉正确的思路.abcabcd
        //应该是从第一个字符开始,把不同的字符加进临时字符中.直到出现重复(后)的字符.把临时字符中从头开始到重复字符(前)全部去掉.然后继续累积.

        //这个实现的好复杂,自己都被绕晕了.
        //如果不减少循环.可能会好一点.
        $s_length = strlen($s);
        if ($s_length < 2) {
            return $s_length;
        }
        $max = 1;
        $temp_str = $s[0];
        $possible_str = $temp_str;
        for ($i = 1; $i < $s_length; $i++) {//减少一次循环
            if (strpos($possible_str, $s[$i]) === false) {
                //如果是从未出现的全新字符,对于临时字符来说也是 全新的
                $possible_str .= $s[$i];
                $temp_str .= $s[$i];
                strlen($temp_str) > $max ? $max = strlen($temp_str) : null;//可能是break:出现新的字符,可能是continue,循环完了
                //出现新字符,统计一下
            } else {
                //以前出现过的字符.这里就需要对字符串做处理了.刚进入,不需要统计
                //abcabc....
                //abcc...
                $pos = strpos($temp_str, $s[$i]) === false ? -1 : strpos($temp_str, $s[$i]);       //**注意,不存在返回的是false,小心自动转换
                $temp_str .= $s[$i];
                $temp_str = substr($temp_str, $pos + 1);
                strlen($temp_str) > $max ? $max = strlen($temp_str) : null; //也是可能加上旧字符
                for ($k = $i + 1; $k < $s_length; $k++) {
                    if (strpos($possible_str, $s[$k]) === false) {
                        $possible_str .= $s[$k];
                        $temp_str .= $s[$k];

                        $i = $k;
                        break;
                    } else {
                        //以前出现过的.
                        $pos = strpos($temp_str, $s[$k]) === false ? -1 : strpos($temp_str, $s[$k]);    // //**注意,不存在返回的是false,小心自动转换
                        $temp_str .= $s[$k];
                        $temp_str = substr($temp_str, $pos + 1);
                        strlen($temp_str) > $max ? $max = strlen($temp_str) : null;
                        //旧字符累加.比如前面一共出现过5种字符 aabbccddeeabcd eabcd这里累积起来了.
                        $i = $k;
                    }
                }
                strlen($temp_str) > $max ? $max = strlen($temp_str) : null;//可能是break:出现新的字符,统计一下
            }
        }
        //应该是还可以优化的.要不然 abcabcabc,就得一直循环到字符串结束.
        return $max;
    }
}

$s = new Solution();
//echo $s->lengthOfLongestSubstring("pwwkew");//3
//echo $s->lengthOfLongestSubstring("bwf");//3
//echo $s->lengthOfLongestSubstring("au");  //2
//echo $s->lengthOfLongestSubstring("abcabcbb");//3
//echo $s->lengthOfLongestSubstring("ckilbkd");//5
echo $s->lengthOfLongestSubstring("bbbbb");//8
echo $s->lengthOfLongestSubstring("alouzxilkaxkufsu");//8
echo $s->lengthOfLongestSubstring("epfvryouvrlbaoogoblwwamyrmgeexvjnagebuyynjzoznwnqjln");  //xvjnagebuy    //10
//epfvryouvr lbaoogoblw wamyrmgeex vjnagebuyy njzoznwnqj ln
