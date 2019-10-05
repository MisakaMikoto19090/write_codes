<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
      //这个思路真的很好,相当于做一个array_flip
      $dict=[];
      $max_length=0;
      for($i=0,$start=0,$temp_length=0;$i<strlen($s); $i++){
        $char=$s[$i];
        if (isset($dict[$char])&&$dict[$char]>=$start) {
          $start=$dict[$char]+1;//从重复字符的下一位开始.
          $temp_length=$i-1-$dict[$char];
        }else{
          //新制服,直接增加
          //这里是关键,
          $temp_length=$i+1-$start;
        }
        $temp_length>$max_length?$max_length=$temp_length:null;
        $dict[$char]=$i;
      }
      return $max_length;
    }
}

$k = new Solution();
// echo $k->lengthOfLongestSubstring("abcabcbb") . "\n";
echo $k->lengthOfLongestSubstring("pwwkew") . "\n";
$res = $k->lengthOfLongestSubstring("bwf") . "\n";

echo $res;