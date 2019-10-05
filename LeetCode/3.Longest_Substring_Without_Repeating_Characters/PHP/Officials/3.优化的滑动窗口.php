<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
      //应该是跟我第一次做的思路差不多
      $max_str='';
      $temp_str='';
      $s_len=strlen($s);
      for($i=0; $i<$s_len; $i++){
        for($j=$i; $j<$s_len; $j++){
          $pos=strpos($temp_str,$s[$j]);
          if (is_numeric($pos)) {
            //存在
            # code...
            strlen($temp_str)>strlen($max_str)?$max_str=$temp_str:null;
            $temp_str.=$s[$j];
            $temp_str=substr($temp_str,$pos+1);
            $i=$j;
            break;
          }
          $temp_str.=$s[$j];
          strlen($temp_str)>strlen($max_str)?$max_str=$temp_str:null;
        }
      }
      return strlen($max_str);
    }
}

$k = new Solution();
$a=$k->lengthOfLongestSubstring("dvdf");
var_dump($a);