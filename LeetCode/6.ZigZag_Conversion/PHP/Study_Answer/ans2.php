<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    //两个答案好像差不多.都是找规律
    function convert($s, $numRows) {
        $len = strlen($s);
        $str = '';
        $Remainder = $numRows+$numRows-2;
        if($Remainder == 0) return $s;
        for($i=1;$i<=$numRows;$i++) {
            for($j=$i;$j<=$len;$j+=$Remainder){
                $str .= $s[$j-1];
                if($i !== 1 && $i !== $numRows && ($j+($numRows-$i)*2) <= $len){
                    $str .= $s[$j+($numRows-$i)*2-1];
                }
            }
        }
        return $str;
    }
}

$s=new Solution();
$s->convert("PAYPALISHIRING",3);