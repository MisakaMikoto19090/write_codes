<?php

// Definition for a singly-linked list.
class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val)
    {
        $this->val = $val;
    }
}

class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        //思路是正确的.但是还是有可以优化的地方.
        //两个个位数相加是不可能超过20的.所以$upgrade只能是1或者0.不需要使用% 直接-10就行了, +-的速度肯定比乘法除法速度快
        //while可以换成do while
        //比如,两个参数都是一个节点的node
        //while 判断,执行,判断
        //do while 执行,判断, 少了一次判断
        //$flag 可以直接用$node来做标记  当生成第一个ListNode时,node肯定时null, 这样少了一个变量
        //一些嵌套的方法,比如 $l1时null +5 涉及到自动转换,在判断时,直接赋值为0
        $up = 0;
        $node = null;
        do {
            $a = is_null($l1) ? 0 : $l1->val;
            $b = is_null($l2) ? 0 : $l2->val;
            $sum = $a + $b + $up;
            if ($sum > 10) {
                $up = 1;
                $current = $sum - 10;
            } else {
                $up = 0;
                $current = $sum;
            }
            if (is_null($node)) {
                $node = new ListNode($current);
                $start = $node;
            } else {
                $node->next = new ListNode($current);
                $node = $node->next;
            }
        } while (!is_null($l1) || !is_null($l2) || $up);
        return $start;
    }
}


$a = new ListNode(2);
$b = new ListNode(4);
$c = new ListNode(3);

$a->next = $b;
$b->next = $c;
$c->next = null;

$x = new ListNode(5);
$y = new ListNode(6);
$z = new ListNode(4);

$x->next = $y;
$y->next = $z;
$z->next = null;

$l = $a + $x;

$s = new Solution();
$s->addTwoNumbers($a, $x);

$a = 100000000000000000000000000001;
$b = number_format($a, 0, '', '');
echo $b;
$c = 564;
$res = number_format((number_format($a, 0, '', '') + $b), 0, '', '');//字符串
$b = 1;

