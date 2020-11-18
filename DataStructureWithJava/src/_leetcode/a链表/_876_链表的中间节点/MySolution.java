package _leetcode.a链表._876_链表的中间节点;

import _leetcode.a链表.ListNode;

// https://leetcode-cn.com/problems/middle-of-the-linked-list/

public class MySolution {
    public static ListNode middleNode(ListNode head) {
        ListNode middle = head;
        int middle_count = 1;
        int end_count = 1;
        while (head != null) {
            if (middle_count * 2 < end_count) {
                middle_count++;
                middle = middle.next;
            }
            end_count++;
            head = head.next;//这两个需要放在后面.
        }
        return middle;
    }

    public static void main(String[] args) {
        ListNode node = null;
        for (int i = 1; i <= 5; i++) {
            ListNode newNode = new ListNode(i);
            newNode.next = node;
            node = newNode;
        }
        middleNode(node);
    }
}