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
        //第二个答案太牛逼了.精彩.
        //不过看起来php自带的sort好像还要快一点.
        $middle = (count($nums1) + count($nums2)) / 2;

        $big = null;
        while ((count($nums1) + count($nums2)) > $middle) {
//            if ($nums1[count($nums1) - 1] >= $nums2[count($nums2) - 1]) {
//                $big = array_pop($nums1);
//            } else {
//                $big = array_pop($nums2);
//            }
            //再简化一下
            $big = $nums1[count($nums1) - 1] >= $nums2[count($nums2) - 1] ? array_pop($nums1) : array_pop($nums2);
        }
        if (is_float($middle)) {
            return $big;
        } else {
            //再弹出来一个.
            $small = $nums1[count($nums1) - 1] >= $nums2[count($nums2) - 1] ? array_pop($nums1) : array_pop($nums2);
            return ($small + $big) / 2;
        }
    }
}
