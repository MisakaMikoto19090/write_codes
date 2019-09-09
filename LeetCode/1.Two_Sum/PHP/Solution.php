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
        //可能需要判断输入
        //$nums的个数需要至少大于等于2
        //$target需要是一个合理的数字
        for ($i = 0; $i < count($nums) - 1; $i++) {
            $minus_res = $target - $nums[$i];
            //这里可能出现[3,3],target=6,应该返回[0,1]
            //           [3,2,4] target=6
            //原来复制了一个数组,现在直接在原数组上操作
            $nums[$i] = null;
            $res = array_search($minus_res, $nums, true);
            if ($res) {//因为这里可能返回0或false,由于替换了,肯定不可能是0
                return [$i, $res];
            }
        }
    }
}

$s = new Solution();
var_dump($s->twoSum([0, 4, 3, 0], 0));

