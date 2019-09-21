<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    //感觉有点类似那种,一圈人挨个点名,7的倍数出去那种 //好像不太对
    //由于字符串是横着输出的.可以变换一下,用一个二维数组来存每一行,然后再输出
    //LEET
    //  C
    // O
    //DEIS
    //  H
    // I
    //RING
    //中间不好处理的字符数是 $numRows-2
    //实现的太丑陋呢, 全都是5%.
    function convert($s, $numRows)
    {
        //把1和2两个特殊值处理一下
        switch ($numRows) {
            case 1:
                return $s;
            case 2:
                while (strlen($s) > 2) {
                    $arr[] = substr($s, 0, 2);
                    $s = substr($s, 2);
                }
                $arr[] = $s;

                break;
            default:
                while (strlen($s) > $numRows) {
                    $arr[] = substr($s, 0, $numRows);
                    $s = substr($s, $numRows);
                    for ($k = $numRows - 2; $k > 0; $k--) {
                        $temp_str = str_repeat(" ", $numRows);
                        $temp_str[$k] = $s[0];
                        $arr[] = $temp_str;
                        $s = substr($s, 1);
                    }
                }
                $arr[] = $s;

                break;
        }
        $new_str = '';
        for ($i = 0; $i < $numRows; $i++) {
            for ($j = 0; $j < count($arr); $j++) {
                if (isset($arr[$j][$i])&&$arr[$j][$i] != ' ') {
                    $new_str .= $arr[$j][$i];
                }
            }
        }
        return $new_str;
    }
}

$s = new Solution();
//var_dump($s->convert("PAYPALISHIRING", 3));
var_dump($s->convert("abcde", 2));

//PAY
// P
//ALI
// S
//HIR
// I
//NG
