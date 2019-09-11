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
        //思路正确,还可以优化
        $up = 0;
        $node = new ListNode(0);  //初始化一个不可能存在的值,该题目中,两个数相加不可能是负数,这里用null
        $solution = $node;  //这里是应用传值了.指向一个地方.

        //由于链表是单向的 ,所以,我可以只返回链表的一部分.
        do {
            //do while ,执行,判断
            //while, 判断,执行,判断, 多一次判断,理论上应该会更慢
            $sum = $up + ($l1 ? $l1->val : 0) + ($l2 ? $l2->val : 0);   //三元运算符优先级更低,需要使用括号
            if ($sum > 9) {
                $up = 1;
                $node->next = new ListNode($sum - 10);
            } else {
                $up = 0;
                $node->next = new ListNode($sum);
            }
            $node = $node->next;//  别忘了赋值,把next创建出来后,需要把自己只想next
            $l1 = $l1 ? $l1->next : null;
            $l2 = $l2 ? $l2->next : null;

        } while ($l1 || $l2 || $up);
        return $solution->next;//链表开头是一个null,后面是结果.直接返回结果.第一的人是真的牛逼.
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

