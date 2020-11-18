package _leetcode.a链表._237_删除链表中的节点;

import _leetcode.a链表.ListNode;

//https://leetcode-cn.com/problems/delete-node-in-a-linked-list/

public class MySolution {
    /**
     * 因为它传进来的是一个node节点,所以可以之直接把当前接的替换成下一个节点
     * <p>
     * 而且其结构不同,外面没有包一层LinkedList,就直接是Node.
     *
     * @param node
     */
    public void deleteNode(ListNode node) {
        node=null;
//        node=node.next;
    }
}