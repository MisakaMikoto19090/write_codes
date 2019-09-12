<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $res = $map = [];
        foreach($nums as $key => $num) {
            $sub = $target - $num;
            if(isset($map[$sub])) {
                return [$key, $map[$sub]];
            }
            $map[$num] = $key;
        }

        return $res;
    }
}