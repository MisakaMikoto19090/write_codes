<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows == 1 || strlen($s) <= $numRows) {
            return $s;
        }

        $return_str = '';

        $distance = 0;
        $distance2 = 0;

        for ($i = 0; $i < $numRows; $i++) {
            $distance = 2 * ($numRows - 1); // first row and last row items have the distance
            $distance2 = ($i > 0 && $i < $numRows -1) ? $distance - 2 * $i: 0; // the other row have the distance
            //这里是相当于换行,
            for ($j = $i; $j < strlen($s); $j += $distance) {
                $return_str .= $s[$j];

                if ($distance2 && $j + $distance2 < strlen($s)) {
                    $return_str .= $s[$j + $distance2];
                }
            }
        }
        return $return_str;
    }
}

$s=new Solution();
$s->convert("PAYPALISHIRING",3);