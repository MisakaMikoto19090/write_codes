<?php
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers(ListNode $l1, ListNode $l2) {
        $current = new ListNode(0);
        $solution = $current;

        $carry = 0;

        while ($l1 || $l2 || $carry > 0) {
            $sum = $carry + ($l1 ? $l1->val : 0) + ($l2 ? $l2->val : 0);

            if ($sum > 9) {
                $carry = 1;
                $current->next = new ListNode($sum - 10);
            }
            else {
                $carry = 0;
                $current->next = new ListNode($sum);
            }

            $current = $current->next;
            $l1 = $l1 ? $l1->next : NULL;
            $l2 =  $l2 ? $l2->next : NULL;
        }


        return $solution->next;
    }

}