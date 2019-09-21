<?php
/****************  中心扩展法  ****************/
class Solution {
    private $s,$len;
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        $len = strlen($s);
        if($len < 2) return $s;         //初始化判断
        $this->len = $len;              //使其成为成员变量
        $this->s = $s;
        $left = $right = 0;             //定义左右边界
        for($i=0;$i<$len;++$i){
            $lenji = $this->centerExpand($i,$i);    //奇数中心扩散，判断该点的回文长度
            $lenou = $this->centerExpand($i,$i+1);  //偶数中心扩散
            $maxLen = max($lenji,$lenou);           //取最大
            if($maxLen > $right-$left+1){
                $right = $i + floor($maxLen/2);     //取新的左右值
                $left = $i - floor(($maxLen-1)/2);  //其本身也包含在内，因此要($maxLen-1)
            }
        }
        return substr($s,$left,$right-$left+1); //截取字符串
    }
    private function centerExpand($left,$right){
        while($left>=0 && $right<$this->len && $this->s[$left] == $this->s[$right]){
            $left--;$right++;
        }
        //当不满足条件是，左右都再进了一位，此时不是常规的$right-$left+1，而是要-1
        return $right-$left-1;
    }
}