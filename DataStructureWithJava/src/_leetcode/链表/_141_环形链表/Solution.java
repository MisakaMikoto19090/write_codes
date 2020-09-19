package _leetcode.链表._141_环形链表;

import _leetcode.链表.ListNode;

// https://leetcode-cn.com/problems/linked-list-cycle/

public class Solution {
    public int POS = -1;

    /**
     * 利用快慢指针,时间复杂度是O(n/2)==>O(n),主要是看快指针的
     * @param head
     * @return
     */
    public boolean hasCycle(ListNode head) {
        if (head==null||head.next==null){
            return false;
        }
        ListNode slow=head;
        ListNode fast=head.next;
        while (fast!=null&&fast.next!=null){
            fast=fast.next.next;
            slow=slow.next;
            if (slow.equals(fast)){
                return true;
            }
        }
        return false;
    }
}