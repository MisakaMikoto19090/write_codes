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
            if (isset($map[$target - $num])) {//剩下的那个数
                $ans[] = $map[$target - $num];
                $ans[] = $key;
                return $ans;
            }
            $map[$num] = $key;  //和另外一个思路是一样的.相当于做了一个array_flip
        }
        return array(0, 0);
    }
}
$s= new Solution();
$s->twoSum([1,2,4,7],6);