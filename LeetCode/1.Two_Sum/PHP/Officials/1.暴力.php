<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
      //暴力就是直接循环,
      for($i=0;$i<count($nums);$i++){
        for ($j=$i+1; $j<count($nums); $j++) {   //时间:n
          # code...
          if ($target==($nums[$i]+$nums[$j])) {   //时间:n-1,n趋近无穷大时==n ,所以n平方
            return [$i,$j];
            # code...
          }
        }
      }
    }
}
//时间复杂度:O(n平方)
//空间复杂度:S(1),分配了$i,$j这两个空间.元素个数增长跟$i,$j没关系.
$s = new Solution();
$a=$s->twoSum([0, 4, 3, 0], 0);
var_dump($a);
