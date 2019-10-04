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
      //为什么每次都还需要看看提示呢?
      //思路:在插入时,判断当前元素和之前的元素是否能组成target
      $temp=[];
      foreach($nums as $key=>$val){
        // if(array_key_exists($target-$val,$temp)&&$key!=$temp[$target-$val]){
        //   return [$key,$temp[$target-$val]];
        // }else{
        //   $temp[$val]=$key;
        // }

        //if语句 最好让大量的结果走true流程,忘了是谁说的呢
        //下面的代码比上面的代码都跑 10次 ,进10ms的 多了两次.姑且算正确的说法把.
        //但是不是太好理解.
        // if(!array_key_exists($target-$val,$temp)||$key==(temp[$target-$val])){
        //   $temp[$val]=$key;
        // }else{
        //   return [$key,$temp[$target-$val]];
        // }

        //上面的判断用isset,应该会更快.总体上是要快一点.
        if(!isset($temp[$target-$val])||$key==(temp[$target-$val])){
          $temp[$val]=$key;
        }else{
          return [$key,$temp[$target-$val]];
        }
      }
    }
}
//时间复杂度:O(n)
//空间复杂度:S(n),分配了一个同样大 的数组
$s = new Solution();
$a=$s->twoSum([3,2,4], 6);
var_dump($a);
