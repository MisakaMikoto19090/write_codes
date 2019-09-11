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
        //原来是直接把链表读取出来作为两个数字相加.但是有一个测试用例的数字太大,超过了double.只能手动实现一个相加了.
        $res_str = '';
        //传说中的链表.
        $l1_str = '';
        $l2_str = '';
        do {
            $l1_str = $l1->val . $l1_str;
            is_null($l1) ?: $l1 = $l1->next;
            $l2_str = $l2->val . $l2_str;
            is_null($l2) ?: $l2 = $l2->next;
        } while (!is_null($l1) || !is_null($l2));//注意,这里应该判断的是l1,而不是l1->next

        $res_str .= number_format(((double)$l1_str + (double)$l2_str), 0, '', '');//字符串
        //这里不能使用计算,有一个超大的数过不了.
        $res_str = strrev($res_str);
        $res_arr = str_split($res_str);   //转换为数组;
        for ($i = 0; $i < count($res_arr); $i++) {
            if ($i == 0) {
                $node = new ListNode($res_arr[$i]);
                $start = $node;
            } else {
                $node->next = new ListNode($res_arr[$i]);//这里编辑器可能会提示未定义,其实是定义了,第一次循环定义了
                $node = $node->next;    //这里需要注意,每次循环后需要更改node对象
            }
        }
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

$a = 100000000000000000000000000001;
$b=number_format($a,0,'','');
echo $b;
$c = 564;
$res = number_format((number_format($a, 0, '', '') + $b), 0, '', '');//字符串
$b = 1;

