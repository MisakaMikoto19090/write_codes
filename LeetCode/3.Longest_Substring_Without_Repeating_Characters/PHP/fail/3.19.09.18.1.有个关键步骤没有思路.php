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
        //思路是正确的,实现有点二,从第一个开始循环,然后从该字符位置开始,寻找该字符
        $s_length = strlen($s);
        if ($s_length < 2) {
            return $s_length;
        }
        $max_length = 1;
        for ($i = 0; $i < $s_length; $i++) {
            $next_position = strpos($s, $s[$i], ($i + 1));//这里的offset不能==$i,如果等于就是返回的$i的位置
            if ($next_position === false) {//不存在
                //$next_position = $s_length;     //这里有问题,必须是,后面的每一个字符也是不重复时,才可以直接计算到结尾.
                //abcabcbb $i=3时,这种情况不对.
                //????还是没有想到怎么实现
                //需要一个数组来判断是否有出现过的字符.

            }
            $possible_length = $next_position - $i;
            $max_length = $possible_length > $max_length ? $possible_length : $max_length;
//            if ($possible_length>($s_length/2)){
//                break;
//            }
            //这里应该能减少几次循环,比如abcdefg,第一次循环就能得出最长的是7,
        }
        return $max_length;
    }
}

$s = new Solution();
//echo $s->lengthOfLongestSubstring("pwwkew");//3
//echo $s->lengthOfLongestSubstring("bwf");//3
//echo $s->lengthOfLongestSubstring("au");  //2
echo $s->lengthOfLongestSubstring("abcabcbb");//3
//echo $s->lengthOfLongestSubstring("ckilbkd");//5
//echo $s->lengthOfLongestSubstring("bbbbb");//8
//echo $s->lengthOfLongestSubstring("alouzxilkaxkufsu");//8
//echo $s->lengthOfLongestSubstring("epfvryouvrlbaoogoblwwamyrmgeexvjnagebuyynjzoznwnqjln");  //xvjnagebuy    //10    //epfvryouvr lbaoogoblw wamyrmgeex vjnagebuyy njzoznwnqj ln

