<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        //这个思路好像搞明白了
        //1.abcd,这4个字符.排列组合最长也就是4.不可能更多,除非出现新的字符abcdaabbbcccddd==>4
        //2.abcdx,最多5个,不重复的一定比5个小.至少是2abcdabcdx==>5 abcdaabbccddx==>4
        //3.所以,做一个临时字符保存出现过的字符.判断下一个字符如果出现过.可以直接跳过.如果是未出现的.以该字符未分界.向前判断,先后判断.构造出一个新的临时字符.

        //实现的真丑陋.太复杂了.
        $length = strlen($s);
        if ($length < 2) {
            return $length;
        }
        $temp_str = $s[0];
        $no_repeat_char_before_new_char = 1;
        for ($i = 1; $i < $length; $i++) {//减少一次循环
            if (strpos($temp_str, $s[$i]) === false) {//新字符.加入
                if ($no_repeat_char_before_new_char) {
                    //全新的.可以直接加入
                    $temp_str .= $s[$i];
                } else {
                    //abcabcd,判断到d这里,前面出现过的时候
                    $new_temp_str = '';
                    for ($j = $i - 1; $j >= $i - strlen($temp_str); $j--) {
                        if (strpos($new_temp_str, $s[$j]) === false) {
                            $new_temp_str = $s[$j] . $new_temp_str;
                        } else {
                            break;
                        }
                    }
                    for ($k = $i; $k < $length; $k++) {
                        if (strpos($new_temp_str, $s[$k]) === false) {
                            $new_temp_str .= $s[$k];
                        } else {
                            strlen($new_temp_str) >= strlen($temp_str) ? $temp_str = $new_temp_str : null;
                            break;
                        }
                    }
                    strlen($new_temp_str) >= strlen($temp_str) ? $temp_str = $new_temp_str : null;
                    if ($k == $length - 1) {//执行到尾部了.
                        break;
                    }
                }

            } else {
                $no_repeat_char_before_new_char = 0;
                continue;
            }
        }
        $max = strlen($temp_str);
        return $max;
    }
}

$s = new Solution();
//$s->lengthOfLongestSubstring("pwwkew");
//$s->lengthOfLongestSubstring("bwf");
//echo $s->lengthOfLongestSubstring("abcabcbb");
//echo $s->lengthOfLongestSubstring("ckilbkd");
echo $s->lengthOfLongestSubstring("epfvryouvrlbaoogoblwwamyrmgeexvjnagebuyynjzoznwnqjln");  //xvjnagebuy

//$s->lengthOfLongestSubstring("au");