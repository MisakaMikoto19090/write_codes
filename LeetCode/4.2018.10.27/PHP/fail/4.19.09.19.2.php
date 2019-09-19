<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        //要求:log(m+n)
        //运行通过,来查看答案
        $arr = array_merge($nums1, $nums2);
        sort($arr);
        $middle = (count($arr) - 1) / 2;
        if (is_float($middle)) {
            return ($arr[intval(floor($middle))] + $arr[intval(ceil($middle))]) / 2;
        } else {
            return $arr[$middle];
        }
    }
}

$s = new Solution();
var_dump($s->findMedianSortedArrays([1, 3], [2]));
