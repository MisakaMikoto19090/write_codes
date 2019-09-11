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
        $arr = [];
        for ($i = 0; $i < count($nums); $i++) {
            if (isset($arr[$target - $nums[$i]])) {
                return [$arr[$target - $nums[$i]], $i];
            } else {
                $arr[$nums[$i]] = $i;
            }
        }
    }
}

$s = new Solution();
var_dump($s->twoSum([0, 4, 3, 0], 0));
//                   0, 1, 2, 3,
