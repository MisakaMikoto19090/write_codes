<?php
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $p = $l1; $q= $l2;
        $carry = 0;
        while($p != null || $q != null){
            $x = is_null($p) ? 0 : $p->val;
            $y = is_null($q) ? 0 : $q->val;
            $sum = $x + $y + $carry;
            $carry =  floor($sum / 10);
            if(!isset($curr)){
                $res = new ListNode($sum%10);
                $curr = $res;
            }else{
                $curr->next = new ListNode($sum%10);
                $curr = $curr->next;
            }
            if($p !== null) $p = $p->next;
            if($q !== null) $q = $q->next;
        }
        if($carry > 0){
            $curr->next = new ListNode($carry);
        }
        return $res;
    }
}