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
        count($nums1) > count($nums2) ? null : list($nums1, $nums2) = [$nums2, $nums1];
        //$nums1是大数组

        if (!empty($nums2)) {
            //两个都不为空
            //最理想的情况就是,一个的最大是另外一个的最小,两个可以直接合并,然后取中位数
            //如果是互相
            foreach ($nums2 as $value) {
                $count1 = count($nums1);
                $pos = $count1 - 1;
                do {
                    if (isset($count1[$pos + 1])) {
                        //说明是在数组里
                        if ($value){}       //这里有问题.
                    } else {
                        //第一次循环
                        if ($value >= $nums1[$pos]) {
                            //比最大的还大
                            $nums1[] = $value;//追加进去
                            break;
                        } else {
                            $pos = intval(floor(count($nums1) / 2));//floor才能取到0
                        }
                    }
                } while (!($value <= $nums1[$pos] && $value >= $nums1[$pos - 1]));
            }
        } else {
            //有一个位空,题目要求不会出现两个都是空
            $middle = count($nums1) / 2;
            if (is_float($middle)) {
                return ($$nums1[intval(floor($middle))] + $$nums1[intval(ceil($middle))]) / 2;
            } else {
                return $$nums1[$middle];
            }
        }
    }
}