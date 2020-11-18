package _leetcode.a链表._203_移除链表元素;

import _leetcode.a链表.ListNode;

// https://leetcode-cn.com/problems/remove-linked-list-elements/

/**
 * 好菜啊,看答案才做出来,增加一个头节点.
 */
public class MySolution {
    public static ListNode removeElements(ListNode head, int val) {
        ListNode start = new ListNode(0);
        start.next = head;

        ListNode pre=start;
        ListNode curr=start.next;
        while (curr!=null){
            if (curr.val==val){
                pre.next=curr.next;
            }else{
                pre=pre.next;
            }
            curr=curr.next;
        }

        return start.next;

//      ========================
//        ListNode start = head;
//        while (head != null) {
//            if (head.val == val) {
//                if (head.next == null) {//怎么处理最后一个元素
//                    head=null;  //对应的那个node不会被删除.
//                } else {
//                    head.val = head.next.val;//可以
//                    head.next = head.next.next;
//                }
//            }
//            head = head.next;
//        }
//        return start;//只需要头
    }

    public static void main(String[] args) {
        ListNode node = null;
        for (int i = 1; i < 4; i++) {
            ListNode newNode = new ListNode(i);
            newNode.next = node;
            node = newNode;
        }
        removeElements(node, 1);
    }
}
