<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len    = strlen($s);
        $result = '';
        $ret    = '';
        for ($i = 0; $i < $len; $i++) {
            $left  = $i;
            $right = $i;
            $ret   = '';
            while ($right < $len && $s[$left] == $s[$right]) {
                //处理相同的     ..aa.. ..aaa..
                $ret .= $s[$right];
                $right++;
            }
            //.. aba
            $i += $right - $left -1;        //这里非常关键,可以减少很多循环,如果去掉了,就增加一个数量级.比如 aaaaaaaab.. $i就直接从0变成了7
            $left--;
            while ($left >= 0 && $right < $len && $s[$left] == $s[$right]) {
                $ret = $s[$left] . $ret . $s[$left];
                $left--;
                $right++;
            }
            if (strlen($result) < strlen($ret)) {
                $result = $ret;
            }
            if (strlen($result) > (($len - $i) * 2)) {
                break;
            }
        }
        return $result;
    }
}
$s = new Solution();
//echo $s->longestPalindrome("cbbd") . "\n";
//echo $s->longestPalindrome("ccd") . "\n";
echo $s->longestPalindrome("aaaa") . "\n";
echo $s->longestPalindrome("adam") . "\n";
echo $s->longestPalindrome("babadada") . "\n";