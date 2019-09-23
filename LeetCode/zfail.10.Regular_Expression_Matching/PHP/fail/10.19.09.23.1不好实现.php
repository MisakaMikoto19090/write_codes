<?php

class Solution
{

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        $j = 0;//$s的
        $flag = false;
        for ($i = 0; $i < strlen($p); $i++) {
            switch ($p[$i]) {
                case '.':
                    if (isset($s[$i + 1]) && $s[$i + 1] == '*') {
                        //.*字符.???有点苦难  如果是是.*.这种鬼畜的正则怎么处理呢?
                        $i++;
                    }


                    break;
                case '*':

                    break;
                default:
            }

        }
        return $flag;
    }
}