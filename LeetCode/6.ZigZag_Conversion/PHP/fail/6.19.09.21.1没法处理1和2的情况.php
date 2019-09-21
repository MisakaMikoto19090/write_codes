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
    function convert($s, $numRows)
    {
        $s_arr = str_split($s);
        $arr = [];
        if ($numRows == 2) {
            //等会处理
        }

        for ($i = 0; $i < $numRows; $i++) {
            if (count($s_arr)) {
                $line[] = array_shift($s_arr);
                if (count($line) == $numRows||count($s_arr)==0) {
                    $arr[] = $line;
                    for ($j = $numRows - 2; $j > 0; $j--) { //如果是2呢?
                        $line = array_fill(0, $numRows, '');
                        if (count($s_arr)) {
                            $line[$j] = array_shift($s_arr);
                            $arr[] = $line;
                            $line = [];
                        } else {
                            break 2;
                        }
                    }
                    $i = -1;
                }
            } else {
                break;
            }
        }
        $new_str = '';
        for ($k = 0; $k < $numRows; $k++) {
            for ($j = 0; $j < count($arr); $j++) {
                if (strlen($arr[$j][$k])) {
                    $new_str .= $arr[$j][$k];
                }
            }
        }
        return $new_str;
    }
}

$s = new Solution();
echo $s->convert("LEETCODEISHIRING",3);
//PAY
// P
//ALI
// S
//HIR
// I
//NG
