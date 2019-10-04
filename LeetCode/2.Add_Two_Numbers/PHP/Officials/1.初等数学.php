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
      $up=0;
      //由于至少有一个不为空.感觉理论上do while会快一点,少了一组判断
      $init=new ListNode(0);
      //由于是链表,可以生成0->1->2.. 然后返回1->2
      $start=$init;
      do{

        $sum=($l1?$l1->val:0)+($l2?$l2->val:0)+$up;        
        if ($sum>9) {
          $up=1;
          $sum=$sum-10;
        }else{
          $up=0;
        }
        $start->next=new ListNode($sum);
        $start=$start->next;
        $l1=$l1? $l1->next :null;
        $l2=$l2? $l2->next :null;
  
      }while($l1||$l2||$up);

      return $init->next;
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

