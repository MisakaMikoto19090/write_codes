<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
      //不容易相通
      $s_len=strlen($s);
      $offset=0;
      $i=0;
      $max_length=0;
      $length=0;
      while ($i<$s_len) {
        $pos=strpos($s,$s[$i],$offset);
        if (is_numeric($pos)&&$pos<$i) {
          # 有重复的
          $length>$max_length?$max_length=$length:null;
          if ($max_length>=$s_len-1-$pos) {
            # code...
            return $max_length;
          }
          $length=$i-1-$pos;
          $offset=$pos+1;
        }
        $i++;
        $length++;
      }
      return $length;//这里delength比如 abc,这种不重复的.
    }
}

$k = new Solution();
echo $k->lengthOfLongestSubstring2("abcabcbb") . "\n";
echo $k->lengthOfLongestSubstring("pwwkew") . "\n";
$res = $k->lengthOfLongestSubstring("bwf") . "\n";

echo $res;