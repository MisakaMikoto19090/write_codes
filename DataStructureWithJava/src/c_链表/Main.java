package c_链表;

import _leetcode.链表.ListNode;

public class Main {

    public static void main(String[] args) {
        List<Integer> list1 = new LinkedList<>();//接口
        list1.add(1);
        list1.add(0, 5);
        list1.add(100);
        list1.add(list1.size(), 50);
        list1.remove(1);
        System.out.println(list1);

    }
}
