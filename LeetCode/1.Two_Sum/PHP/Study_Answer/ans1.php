<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = array();
        $ans = array();
        foreach($nums as $key => $num) {
            if (isset($map[$target - $num])) {
                $ans[] = $map[$target - $num];
                $ans[] = $key;
                return $ans;
            }
            $map[$num] = $key;
        }
        return array(0, 0);
    }
}