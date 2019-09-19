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
        $stack = array();
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($stack[$target - $nums[$i]])) {
                return array($stack[$target - $nums[$i]], $i);//值对应的位置,$i;

            } else {
                $stack[$nums[$i]] = $i;
                //这里相当于做了一个array_flip, 变成了value==>key
                //并且由于题目中说,有唯一一组解,所以不会出现target=4,[2,2,2]这种情况.
                //并且始终比$num少一个,所以不会出现值被覆盖的情况.

            }
        }
        unset($stack);
        return array();
    }
}

$s = new Solution();
var_dump($s->twoSum([0, 4, 3, 0], 0));
//                   0, 1, 2, 3,

