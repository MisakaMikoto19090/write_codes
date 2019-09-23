<?php

class Solution
{

    /**
     * @param String $str
     * @return Integer
     */
    //这个题目也是,对PHP非常友好啊.
    //感觉使用正则应该会更快.
    function myAtoi($str)
    {
        //不能直接用intval,因为123E5会被转化成指数.

        $str = trim($str);//去空格
        $number_to_string_arr = array_map(function ($x) {
            return $x .= '';
        }, range(0, 9));
        if (in_array($str[0], array_merge(['+', '-'], $number_to_string_arr), true)) {
            if (!is_numeric($str[0])) {
                if ($str[0] == '+') {
                    $positive = true;
                } else {
                    $positive = false;
                }
                $str = substr($str, 1);
            }
            //下面这里会出现+xyz123==>xyz123这种,这种应该还是返回0
            $temp_str = '';
            for ($i = 0; $i < strlen($str); $i++) {
                if (is_numeric($str[$i])) {
                    $temp_str .= $str[$i];
                } else {
                    break;
                }
            }
            $temp_number = intval($temp_str);
            if (isset($positive) && $positive == false) {
                $temp_number *= -1;
            }
            if ($temp_number > (pow(2, 31) - 1)) {
                $temp_number = pow(2, 31) - 1;
            } elseif ($temp_number < -pow(2, 31)) {
                $temp_number = -pow(2, 31);
            }
            return $temp_number;
        } else {
            return 0;
        }
    }
}

$s = new Solution();
//echo $s->myAtoi('42')."\n";
echo $s->myAtoi('.1') . "\n";

