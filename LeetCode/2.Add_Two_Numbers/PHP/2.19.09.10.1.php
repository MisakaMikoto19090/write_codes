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
        //之前加法的思路是可以,但是这样不好.如果链表太长,出来的数据可能溢出.
        //正确的思路:
        //因为链表是从头到尾,并且输出也是反向的.
        //2-4-3-9
        //5-6-4-1-5-6
        //7-0(10)-8
        $upgrade = 0; //这个是进一位.当链表没有循环完,或者循环完了,但是需要进位的时候,循环都不算结束
        $flag = true;
        while (!is_null($l1) || !is_null($l2) || $upgrade) {
            //这里需要判断是否是null
            $sum = $upgrade + (is_null($l1) ? $l1 : $l1->val) + (is_null($l2) ? $l2 : $l2->val);//注意三元运算符的优先级比较低.可能出现$sum是一个ListNode的情况
            $current_pos = $sum % 10;   //当前位.
            $upgrade = intval(floor($sum / 10));//进位数
            $l1 = $l1->next;    //这里为下一次赋值
            $l2 = $l2->next;
            if ($flag) {
                $node = new ListNode($current_pos);
                $start = $node;
                $flag = false;
            } else {
                $node->next = new ListNode($current_pos);
                $node = $node->next;
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

$l = $a + $x;

$s = new Solution();
$s->addTwoNumbers($a, $x);

$a = 100000000000000000000000000001;
$b = number_format($a, 0, '', '');
echo $b;
$c = 564;
$res = number_format((number_format($a, 0, '', '') + $b), 0, '', '');//字符串
$b = 1;

