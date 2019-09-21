<?php

/****************  马拉车算法  ****************/
class Solution
{
    /**
     * @param String $s
     * @return String
     */
    //我靠,我怎么柑橘我的智商不够用.没怎么看懂???
    //19.09.21.睡觉时想了想,完全明白了
    //通过给每个字符中插入一个字符, 不需要判断 ...aa...和...aba...这种状况了...a#a... ...a#b#a... 都变成了中间对称型
    //试试看能不能自己写出来
    function longestPalindrome($s)
    {
        $len = strlen($s);
        if ($len < 2) {
            return $s;         //初始化判断
        }
        $str = '^#' . implode('#', str_split($s)) . '#$';   //分割字符串，使奇偶性统一
        $len = strlen($str);            //计算改好的字符串长度
        $r = array_fill(0, $len, 0);    //初始化半径数组
        $center = $maxRight = 0;        //初始化偏移量：中心点和回文串最大右点    //这个最大右点的意思就是$i+半径
        $maxStr = '';                   //结果，最长的回文串
        for ($i = 1; $i < $len; ++$i) {     //感觉这里如果去掉^和$,应该就可以从0开始.
            //这里if
            if ($i < $maxRight) {//这里
                // #a#b#c#d#c#b#a#...               #牛逼,牛逼
                //#a#b#(center)#b#a#        因为这里是回文,所以这里的半径最多可能是最大距离减去$i
                //                                        或者,考虑到回文.是前面的对称位置的半径.
                //.....center..$i.maxRight      半径可能是2,或者单独截取出来,
                //01010 5    010 1 0
                $r[$i] = min($maxRight - $i, $r[2 * $center - $i]);    //计算当前回文路径的长度
            }
            while ($str[$i - $r[$i] - 1] == $str[$i + $r[$i] + 1]) {    //扩展回文子串半径
                $r[$i]++;
            }
            //这里if,这两个是关键,如果没有这两个if,运行时间奔1秒去了.
            if ($i + $r[$i] > $maxRight) {  //如果超出最右的点，则更新中心点和右节点
                $maxRight = $i + $r[$i];
                $center = $i;
            }
            if (1 + 2 * $r[$i] > strlen($maxStr)) {       //计算当前回文子串是否大于记录的结果
                $maxStr = substr($str, $i - $r[$i], 2 * $r[$i] + 1);
            }
        }
        return str_replace('#', '', $maxStr);
    }
}

//好像有点头绪了19.09.20 晚上12点.
$s = new Solution();
//echo $s->longestPalindrome("cbbd");
//echo $s->longestPalindrome("ccd");
//echo $s->longestPalindrome("aaaa");
//echo $s->longestPalindrome("adam");
echo $s->longestPalindrome("babadada") . "\n";