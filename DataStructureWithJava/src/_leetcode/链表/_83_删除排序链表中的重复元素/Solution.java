package _leetcode.链表._83_删除排序链表中的重复元素;

import _leetcode.链表.ListNode;

// https://leetcode-cn.com/problems/remove-duplicates-from-sorted-list/

/**
 *
 */
public class Solution {
    public ListNode deleteDuplicates(ListNode head) {
        ListNode start=head;
        while (head!=null&&head.next!=null){
            if (head.val==head.next.val){
                head.next=head.next.next;
                continue;   //这个是为了防止,比如[1,1,1],如果直接head=head.next,就会使[1,1]
                //即删除所有相同的.
            }
            head=head.next;
        }
        return start;
    }
}