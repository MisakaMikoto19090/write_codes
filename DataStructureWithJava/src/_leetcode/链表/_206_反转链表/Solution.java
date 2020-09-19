package _leetcode.链表._206_反转链表;

import _leetcode.链表.ListNode;


// https://leetcode-cn.com/problems/reverse-linked-list/


class Solution {
    /**
     * 递归,我日,这个思路好难整理啊.
     * 思路,从头的下一个开始,最后处理头
     *
     * @param head
     * @return
     */
    public ListNode reverseList(ListNode head) {
        if (head == null || head.next == null) {
            //0个节点||1个节点
            return head;
        }
        ListNode newHead = reverseList(head.next);
        head.next.next = head;
        head.next = null;
        return newHead;
    }

    public ListNode reverseList2(ListNode head) {
        if (head == null || head.next == null) {
            //0个节点||1个节点
            return head;
        }
        ListNode newHead = null;
        while (head != null) {
            ListNode tmp = head.next;
            head.next = newHead;
            newHead = head;
            head = tmp;
        }

        return newHead;

    }
}