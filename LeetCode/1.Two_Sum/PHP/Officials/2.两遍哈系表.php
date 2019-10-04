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
      //保持数组中的每个元素与其索引相互对应的最好方法是什么？哈希表。
      $temp=[];
      foreach ($nums as $key=>$val){  //时间复杂度 n,空间复杂度 n
        $temp[$val]=$key;
      }
      for($i=0;$i<count($nums); $i++){//
        if (array_key_exists($target-$nums[$i],$temp)&&$i!=$temp[$target-$nums[$i]]) {//时间复杂度1,空间复杂度没有
          return [$i,$temp[$target-$nums[$i]]];
          # code...
        }
      }
    }
}
//时间复杂度:O(n)
//空间复杂度:S(n),分配了一个同样大 的数组
$s = new Solution();
$a=$s->twoSum([3,2,4], 6);
var_dump($a);
