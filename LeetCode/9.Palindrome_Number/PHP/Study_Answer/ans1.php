<?php


class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    //太挫了,strrev啊
    function isPalindrome($x) {
        $x = (string)$x;
        $x = str_split($x);
        $reversed = array_reverse($x);
        if($x==$reversed){
            return true;
        }else{
            return false;
        }
    }
}

