<?php
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    //不看呢,实现的太复杂了.
    function findMedianSortedArrays($nums1, $nums2) {
        // $c1 = count($nums1);
        // $c2 = count($nums2);
        // if ($c1 > $c2) {
        //     return self::findMedianSortedArrays($nums2, $nums1);
        // }


//         $k = intval(($c1 + $c2 + 1)/2);
//         $left = 0; $right = $c1;

//         while($left <= $right) {
//             $mid_left = (int)(($left + $right)/2);
//             $mid_left_2 = $c1 + $c2 - $mid_left;
//             // $mid_left = (int)(($left + $right)/2);
//             // $mid_right = ceil(($left + $right)/2);
//             // $mid_left_2 = (int)($k - $mid_left);
//             // $mid_right_2 = ceil($k - $mid_right);
//             echo $mid_left,$mid_right,$mid_left_2, $mid_right_2;
//             $l_max_1 = $mid_left==0?PHP_INT_MIN:$nums1[intval(($mid_left-1)/2)];
//             $r_min_1 = $mid_left==2*$c1?PHP_INT_MAX:$nums1[intval($mid_left/2)];
//             $l_max_2 = ($mid_left_2)==0?PHP_INT_MIN:$nums2[intval(($mid_left_2-1)/2)];
//             $r_min_2 = ($mid_left_2)==2*$c2?PHP_INT_MAX:$nums2[intval($mid_left_2/2)];
//             if ($l_max_1 > $r_min_2) {
//                 $right = $mid_left-1;
//             } elseif ($l_max_2 > $r_min_1) {
//                 $left = $mid_left+1;
//             } else {
//                 return (max($l_max_1, $l_max_2) + min($r_min_1, $r_min_2))/2;
//             }
//         }
        // $nums1 = [];
        // $nums2 = [2,3];
        $m = count($nums1);
        $n = count($nums2);

        //这一块是处理如果有空数组的情况
        if ($m == 0) {
            if ($n%2==1) {
                return $nums2[($n-1)/2];
            } else {
                return ($nums2[$n/2]+$nums2[$n/2-1])/2;
            }
        } elseif($n == 0) {
            if ($m%2==1) {
                return $nums1[($m-1)/2];
            } else {
                return ($nums1[$m/2]+$nums1[$m/2-1])/2;
            }
        }
        $k = intval(($m + $n + 1)/2);
        // echo $k, "\n";
        $i = $j = 0;$lmax1=0;$lmax2=0;
        while(true) {
            // echo $i,"\t",$j, "\t", $k, "\n";
            if ($k === 1) {
                if (($m+$n)%2==1) {
                    return min($nums1[$i], $nums2[$j]);
                } else {
                    if ($nums1[$i] <= $nums2[$j]) {
                        return ($nums1[$i]+((($i+1)<$m)?min($nums1[$i+1],$nums2[$j]):$nums2[$j]))/2;
                    } else {
                        return ($nums2[$j]+((($j+1)<$n)?min($nums2[$j+1],$nums1[$i]):$nums1[$i]))/2;
                    }
                }
            }

            $index = (int)($k/2);
            $lmax1 = ($i + $index -1) < $m? $nums1[$i + $index - 1]: $nums1[$m-1];
            $lmax2 = ($j + $index - 1) < $n? $nums2[$j + $index - 1]: $nums2[$n-1];
            if ($lmax1 <= $lmax2) {
                if (($i + $index) >= $m) {
                    $j += $k - ($m - $i) - 1;
                    if (($m+$n)%2==1) {
                        return $nums2[$j];
                    } else {
                        return ($nums2[$j] + $nums2[$j+1])/2;
                    }
                } else {
                    $k -= $index;
                    $i += $index;
                }
            } elseif ($lmax1 > $lmax2) {
                if (($j + $index) >= $n) {
                    $i += $k - ($n - $j) - 1;
                    if (($m+$n)%2==1) {
                        return $nums1[$i];
                    } else {
                        return ($nums1[$i] + $nums1[$i+1])/2;
                    }
                } else {
                    $k = $k - $index;
                    $j += ($index);
                }

            }

        }
    }
}
