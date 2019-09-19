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
        //牛逼,牛逼
        $needsAverage = (count($nums1) + count($nums2)) % 2 == 0;   //一个标志,是否是2的倍数个
        $neededCount = (count($nums1) + count($nums2)) / 2;         //中位数位置

        $lastPopped;

        while (count($nums1) + count($nums2) > $neededCount) {  //如果大于,刚好弹出一半.

            if ($nums1[count($nums1) - 1] > $nums2[count($nums2) - 1]) {    //这个的时间复杂度应该是O((m+n)/2)
                $lastPopped = array_pop($nums1);
            } else {
                $lastPopped = array_pop($nums2);
            }
        }

        if ($needsAverage) {
            if ($nums1[count($nums1) - 1] > $nums2[count($nums2) - 1]) {
                $extraLast = array_pop($nums1);
            } else {
                $extraLast = array_pop($nums2);
            }

            return ($lastPopped + $extraLast) / 2.0;
        } else {
            return $lastPopped;
        }
    }
}