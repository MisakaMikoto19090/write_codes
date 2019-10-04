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
            //计算和,并且l1和l2链表进一步.
            if (is_null($l1)) {
                $l1_val = 0;
            } else {
                $l1_val = $l1->val;
                $l1 = $l1->next;
            }
            if (is_null($l2)) {
                $l2_val = 0;
            } else {
                $l2_val = $l2->val;
                $l2 = $l2->next;
            }
            $sum = $l1_val + $l2_val + $up;//这样不直到会不会更快.
            if ($sum >= 10) {
                $up = 1;
                $current = $sum - 10;
            } else {
                $up = 0;
                $current = $sum;
            }
            if (is_null($node)) {
                //判断是否是第一个.
                $node = new ListNode($current);     //2019.09.11 更新:看了最快的代码.这个变量可以不用.可以初始化一个负数的node,直接更改
                $start = $node;
            } else {
                $node->next = new ListNode($current);
                $node = $node->next;
            }
        } while (!is_null($l1) || !is_null($l2) || $up);//不知道能不能在这里判断,并且直接处理l1和l2
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

$s = new Solution();
$s->addTwoNumbers($a, $x);

